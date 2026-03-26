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
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = \App\Models\User::where('t_user_username', $request->username)->first();

        if ($user) {
            $isValid = false;
            // Logika MD5 / Plain / Bcrypt
            if (md5($request->password) === $user->t_user_password) {
                $isValid = true;
            } elseif ($request->password === $user->t_user_password) {
                $isValid = true;
            } elseif (Hash::check($request->password, $user->t_user_password)) {
                $isValid = true;
            }

            if ($isValid) {
                // 1. Simpan data user ke SESSION secara manual
                session([
                    'admin_logged_in' => true,
                    'admin_id'        => $user->t_user_id,
                    'admin_username'  => $user->t_user_username,
                ]);

                // 2. Update status di database
                $user->t_user_last_login = now();
                $user->t_user_islogin = 1;
                $user->save();

                // 3. Redirect ke dashboard
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['login_error' => 'Username atau password salah.']);
    }

    // Tambahkan juga fungsi Logout Manual
    public function logout(Request $request)
    {
        $user = \App\Models\User::where('t_user_id', session('admin_id'))->first();
        if ($user) {
            $user->t_user_islogin = 0;
            $user->save();
        }

        // Hapus semua session manual
        $request->session()->forget(['admin_logged_in', 'admin_id', 'admin_username']);
        $request->session()->flush();

        return redirect()->route('login');
    }
}
