<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // 1. Cari user berdasarkan username
        $user = User::where('t_user_username', $request->username)->first();

        // 2. Jika user ditemukan, kita cek kecocokan passwordnya
        if ($user) {
            $inputPassword = $request->password;
            $dbPassword = $user->t_user_password;
            
            $isPasswordValid = false;
            $needsHashUpgrade = false;

            // Cek Skenario A: Apakah passwordnya sudah Bcrypt? (User baru / User lama yang sudah ter-upgrade)
            if (Hash::check($inputPassword, $dbPassword)) {
                $isPasswordValid = true;
            } 
            // Cek Skenario B: Apakah passwordnya masih MD5? (User legacy dari aplikasi lama)
            elseif (md5($inputPassword) === $dbPassword) {
                $isPasswordValid = true;
                $needsHashUpgrade = true; // Tandai bahwa password ini harus di-upgrade!
            }

            // 3. Jika password valid (baik MD5 maupun Bcrypt)
            if ($isPasswordValid) {
                // Login-kan user secara manual
                Auth::login($user, $request->boolean('remember'));
                $request->session()->regenerate();

                // Update data tracking
                $user->t_user_last_login = now();
                $user->t_user_islogin = 1;

                // EKSEKUSI UPGRADE: Jika tadi masuk lewat MD5, kita ubah jadi Bcrypt sekarang!
                if ($needsHashUpgrade) {
                    $user->t_user_password = Hash::make($inputPassword);
                }

                $user->save();

                return redirect()->intended('admin/dashboard');
            }
        }

        // Jika user tidak ditemukan ATAU password salah
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }
}
