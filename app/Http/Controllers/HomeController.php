<?php

namespace App\Http\Controllers;

use App\Mail\ActiveMail;
use App\Mail\ForgotPasswordMail;
use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index() {
        Auth::guard('web')->logout();
        return view('client.home');
    }

    public function register() {
        return view('client.register');
    }

    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $token = strtoupper(Str::random(20));

        $request->merge(['token' => $token, 'password' => Hash::make($request->password)]);

        $user = User::create($request->all());

        $mailData = [
            'id' => $user->id,
            'name' => $user->name,
            'token' => $user->token
        ];

        Mail::to($user->email)->send(new ActiveMail($mailData));

        return redirect()->route('login');
    }

    public function login() {
        return view('client.login');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::guard('web')->user()->is_active == 0) {
                Auth::guard('web')->logout();
                return redirect()->back()->with('no', 'Tài khoản chưa được kích hoạt');
            }
            return redirect()->route('home');
        }
        return redirect()->back()->with('no', 'Sai tài khoản hoặc mật khẩu');
    }

    public function active(string $id, string $token) {
        $user = User::find($id);
        if($user->token === $token) {
            $user->is_active = 1;
            $user->token = strtoupper(Str::random(20));
            $user->save();
        }

        return redirect()->route('login');
    }

    public function logOut() {
        Auth::guard('web')->logOut();
        return redirect()->route('login');
    }

    public function rePassword(string $id, string $token) {
        return view('client.re-password', compact('id', 'token'));
    }

    public function postRePassword(Request $request) {
        $request->validate([
            'password' => 'required',
        ]);
        
        $user = User::find($request->id);
        if($user->id == $request->id && $user->token == $request->token) {
            $user->password = Hash::make($request->password);
            $user->token = strtoupper(Str::random(20));
            $user->save();

            return redirect()->route('login')->with('no', 'Bạn vừa thay đổi mật khẩu thành công');
        }
    }

    public function forgotPassword() {
        return view('client.mail.forgotPassword');
    }

    public function postForgotPassword(Request $request) {
        $request->validate([
            'email' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if(isset($user->id)) {
            $mailData = [
                'id' => $user->id,
                'name' => $user->name,
                'token' => $user->token
            ];
            Mail::to($user->email)->send(new ForgotPasswordMail($mailData));
    
            return redirect()->route('login');
        }

        return redirect()->back()->with('no', 'Không tìm thấy email trong hệ thống');
    }
}
