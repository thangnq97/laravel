<?php

namespace App\Http\Controllers;

use App\Mail\ActiveMail;
use App\Mail\ForgotPasswordMail;
use App\Models\admin\Bills;
use App\Models\admin\Colors;
use App\Models\admin\Comments;
use App\Models\admin\Product_variant;
use App\Models\admin\Products;
use App\Models\admin\Sizes;
use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $top8 = DB::table('products')->select()->orderBy('views', 'desc')->take(8)->get();
        $new8 = DB::table('products')->select()->orderBy('created_at', 'desc')->take(8)->get();

        return view('client.home', compact('top8', 'new8'));
    }

    public function pages() {
        return view('client.pages');
    }

    public function shop() {
        $products = DB::table('products')->paginate(8);
        // dd($products);

        return view('client.shop', compact('products'));
    }

    public function blog() {
        return view('client.blog');
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

    public function detail(string $id) {
        $colors = Colors::all();
        $sizes = Sizes::all();
        $product = Products::find($id);
        $comments = Comments::where('product_id', $id)->get();
        $variants = Product_variant::where('product_id', $id)->where('quantity', '>', 0)->get();
        return view('client.product-detail', compact('product', 'variants', 'comments', 'colors', 'sizes'));
    }

    public function signOut() {
        Auth::logout();
        return redirect()->route('sign-out');
    }

    public function postComment(Request $request) {
        $request->validate([
            'content' => 'required',
        ]);

        Comments::create([
            'content' => $request->content,
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function history() {
        $user = Auth::user();
        
        $bills = Bills::where('user_id', $user->id)->select()->get();

        return view('client.history', compact('bills'));
    }
}
