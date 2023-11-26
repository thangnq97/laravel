<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return view('admin.account.index');
    }

    public function login() {
        return view('admin.account.login');
    }

    public function saveLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('no', 'Sai tài khoản hoặc mật khẩu');
    }

    public function signOut() {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
