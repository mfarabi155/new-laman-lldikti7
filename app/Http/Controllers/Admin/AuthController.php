<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Bagian;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('t_user_username', $request->username)->first();

        if ($user) {
            if ($user->t_user_status == 0) {
                return back()->withErrors([
                    'login_error' => 'Login ditolak! Akun Anda telah dinonaktifkan. Hubungi Administrator.'
                ])->onlyInput('username');
            }
            $isValid = false;
            
            if (md5(base64_decode($request->password)) === $user->t_user_password) {
                $isValid = true;
            } elseif ($request->password === $user->t_user_password) {
                $isValid = true;
            } else {
                try {
                    if (Hash::check($request->password, $user->t_user_password)) {
                        $isValid = true;
                    }
                } catch (\Exception $e) {
                    $isValid = false;
                }
            }
            if ($isValid) {
                $bagianNama = Bagian::where('bagian_id', $user->t_bagian_id)->value('bagian_nama') ?? 'Administrator';
                session([
                    'admin_logged_in' => true,
                    'admin_id'        => $user->t_user_id,
                    'admin_username'  => $user->t_user_username,
                    'admin_bagian_id'   => $user->t_bagian_id,
                    'admin_bagian_nama' => $bagianNama
                ]);

                $user->t_user_last_login = now();
                $user->t_user_islogin = 1;
                $user->save();

                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['login_error' => 'Username atau password salah.']);
    }

    public function logout(Request $request)
    {
        $user = User::where('t_user_id', session('admin_id'))->first();
        if ($user) {
            $user->t_user_islogin = 0;
            $user->save();
        }

        $request->session()->forget(['admin_logged_in', 'admin_id', 'admin_username']);
        $request->session()->flush();

        return redirect()->route('login');
    }
}
