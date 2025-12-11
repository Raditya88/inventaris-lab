<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $admin = DB::table('admins')->where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged_in' => true]);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect('/login');
    }
}
