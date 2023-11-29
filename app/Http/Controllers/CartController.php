<?php

namespace App\Http\Controllers;

use App\Models\admin\Bill_detail;
use App\Models\admin\Bills;
use App\Models\admin\Colors;
use App\Models\admin\Product_variant;
use App\Models\admin\Products;
use App\Models\admin\Sizes;
use App\Models\admin\Vouchers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // dd(now());
        // dd(session()->all());
        // session()->forget('cart');
        // session()->forget('total_price');
        // session()->forget('voucher');
        return view('client.cart');
    }
    public function addCart(Request $request)
    {
        $variant = Product_variant::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->first();

        if ($variant) {
            $cart = session()->get('cart', []);
            session()->get('total_price', 0);
            $total_price = 0;
            if (isset($cart[$variant->id])) {
                $cart[$variant->id]['quantity'] += $request->quantity;
                // dd($cart[$variant->id]['quantity']);
                $cart[$variant->id]['total_price'] += ($variant->price * $request->quantity);
                // dd($cart);
            } else {
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

    public function addVoucher(Request $request)
    {
        $voucher = Vouchers::where('name', $request->voucher)->where('expiry', '>', now())->first();
        if ($voucher) {
            session()->get('voucher', null);
            session()->put('voucher', $voucher);

            return redirect()->back()->with('yes', 'Áp dụng voucher thành công');
        }

        return redirect()->back()->with('no', 'Voucher không tồn tại hoặc đã hết hạn sử dụng');
    }

    public function deleteCart(string $key)
    {
        $total_price = session()->get('total_price');
        $cart = session()->get('cart');
        if (isset($cart[$key])) {
            $total_price -= $cart[$key]['total_price'];
            unset($cart[$key]);
            session()->put('cart', $cart);
            session()->put('total_price', $total_price);
            if (count($cart) == 0) {
                session()->forget('voucher');
            }
        }

        return redirect()->back();
    }

    public function cartConfirm()
    {
            if(session()->has('cart')) {
                if(session()->get('cart')) {
                    // dd(session()->get('cart'));
                    return view('client.confirm');
                }
                return redirect()->back();
            }
            return redirect()->back();
    }

    public function addDetail(string $bill, array $array)
    {
        Bill_detail::create([
            'quantity' => $array['quantity'],
            'variant_id' => $array['variant_id'],
            'total_price' => $array['total_price'],
            'bill_id' => $bill
        ]);
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function postConfirm(Request $request)
    {
        if (session()->has('cart')) {
            $request->validate([
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required|max:255',
            ]);
            $total_price = session()->get('total_price');

            if (session()->has('voucher')) {
                $total_price -= session()->get('voucher')->discount;
                $voucher = session()->get('voucher')->id;
                $request->merge(['voucher_id' => $voucher]);
            }

            $request->merge(['user_id' => Auth::user()->id, 'total_price' => $total_price]);
            $bill = Bills::create($request->all());

            foreach (session()->get('cart') as $key => $value) {
                $this->addDetail($bill->id, $value);
            }
            session()->forget('cart');
            session()->forget('total_price');
            session()->forget('voucher');

            //thanh toan

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua ATM MoMo";
            $amount = $_POST['total_price'];
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/cart-confirm";
            $ipnUrl = "http://127.0.0.1:8000/cart-confirm";
            $extraData = "";



            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            // dd($result);
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
            // header('Location: ' . $jsonResult['payUrl']);

            // return redirect()->back()->with('yes', 'Đặt hàng thành công, vui lòng kiểm tra email');
        }
        return redirect()->route('home');
    }
}
