<?php

namespace App\Http\Controllers;

use App\Models\admin\Colors;
use App\Models\admin\Product_variant;
use App\Models\admin\Products;
use App\Models\admin\Sizes;
use App\Models\admin\Vouchers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        // dd(session()->all());
        // session()->forget('cart');
        // session()->forget('total_price');
        // session()->forget('voucher');
        return view('client.cart');
    }
    public function addCart(Request $request) {
        $variant = Product_variant::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->first();
        
        if($variant) {
            $cart = session()->get('cart', []);
            session()->get('total_price', 0);
            $total_price = 0;
            if(isset($cart[$variant->id])) {
                $cart[$variant->id]['quantity'] += $request->quantity;
                // dd($cart[$variant->id]['quantity']);
                $cart[$variant->id]['total_price'] += ($variant->price * $request->quantity);
                // dd($cart);
            }else {
                $cart[$variant->id] = [
                    'product' => Products::find($request->product_id)->name,
                    'image' => Products::find($request->product_id)->image,
                    'color' => Colors::find($request->color_id)->name,
                    'size' => Sizes::find($request->size_id)->name,
                    'quantity' => $request->quantity,
                    'variant_id' => $variant->id,
                    'total_price' => ($variant->price * $request->quantity),
                ];
            }
            session()->put('cart', $cart);
            foreach ($cart as $key => $value) {
                $total_price += $value['total_price'];
            }
            session()->put('total_price', $total_price);
            return redirect()->back()->with('yes', 'Thêm thành công sản phẩm vào giỏ hàng');
        }
        return redirect()->back()->with('no', 'Sản phẩm đã hết hàng');
    }

    public function addVoucher(Request $request) {
        $voucher = Vouchers::where('name', $request->voucher)->first();
        if($voucher) {
            session()->get('voucher', null);
            session()->put('voucher', $voucher);

            return redirect()->back()->with('yes', 'Áp dụng voucher thành công');
        }

        return redirect()->back()->with('no', 'Voucher không tồn tại hoặc đã hết hạn sử dụng');
    }

    public function deleteCart(string $key) {
        $total_price = session()->get('total_price');
        $cart = session()->get('cart');
        if(isset($cart[$key])) {
            $total_price -= $cart[$key]['total_price'];
            unset($cart[$key]);
            session()->put('cart', $cart);
            session()->put('total_price', $total_price);
            if(count($cart) == 0) {
                session()->forget('voucher');
            }
        }
        
        return redirect()->back();
    }

    public function cartConfirm() {
        return view('client.confirm');
    }
    
}
