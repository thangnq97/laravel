@extends('client.layout')

@section('content')
    <!-- banner -->
    <section class="py-10 text-center flex flex-col gap-5 bg-[#335154]">
        <h2 class="text-[#df453e] font-[800] text-[42px]">Shopping cart</h2>
        <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Cart</span></p>
    </section>
    <!-- main -->
    <main class="grid grid-cols-2 gap-8 px-7">
        <!-- product -->
        @if (session()->has('cart'))
            @if (count(session()->get('cart')))
                <section class="flex flex-col gap-5 px-6 py-6">

                    @foreach (session()->get('cart') as $k => $v)
                        <div class="grid grid-cols-4 border-b">
                            <a href="">
                                <img src="{{ asset('assets/img/' . $v['image']) }}" class="w-[110px] h-[110px]" alt="">
                            </a>
                            <div class="col-span-3 flex flex-col justify-center ">
                                <h4 class="text-[14px] font-[600] text-[#335154] mt-3 mb-2">
                                    {{ $v['product'] }}
                                </h4>
                                <div class=" flex justify-between">
                                    <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">
                                        {{ number_format($v['total_price'] / $v['quantity']) }} | {{ $v['color'] }}</p>
                                    <div class="flex items-center gap-8">
                                        <p class="text-[#000] font-[600] text-[18px] text-[df453e] tracking-[1.5px]">
                                            x{{ $v['quantity'] }}</p>
                                        <a onclick="return confirm('are you sure?')" href="{{ route('cart.delete', $k) }}"
                                            class="bg-[#df453e] text-white font-normal text-[15px] px-[8px] py-[4px] hover:bg-[#335154] hover:text-[#df453e] rounded">xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </section>
            @else
                <h4 class="text-[24px] font-[600] text-[#335154] mt-3 mb-2">Giỏ hàng trống</h4>
            @endif
        @else
            <h4 class="text-[24px] font-[600] text-[#335154] mt-3 mb-2">Giỏ hàng trống</h4>
        @endif
        <!-- order -->
        <form class="border-l px-6 py-6" method="POST" action="{{ route('voucher.add') }}">
            @csrf
            <h3 class="text-center text-[24px] font-[600] uppercase mb-5">Tóm tắt đơn hàng</h3>
            <div class="flex justify-between mb-3">
                <p class="text-[14px] font-[600]">Tổng giá trị sản phẩm:</p>
                <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]"><span
                        class="price">{{ number_format(session()->get('total_price')) }}</p>
            </div>
            <div class="flex justify-between mb-3">
                <p class="text-[14px] font-[600]">Phí vận chuyển:</p>
                <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">Miễn phí</p>
            </div>
            <div class="mb-3 flex justify-between">
                <div>
                    <p class="text-[14px] font-[600]">Nhập voucher:</p>
                    <input name="voucher" type="text" class="border border-blue-500 outline-none px-2 py-2 w-[200px]">
                    <input type="submit"
                        class="text-center cursor-pointer bg-[#df453e] text-white text-[13px] px-[5px] py-[9px] hover:bg-[#335154] hover:text-[#df453e] rounded"
                        value="Xác nhận">
                </div>
                @if (session()->has('voucher'))
                    <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">- {{ number_format(session()->get('voucher')->discount) }}</p>
                @endif
            </div>
            <hr>
            @if (session()->has('voucher'))
                <div class="flex justify-between mt-3 mb-8">
                    <b class="text-[22px] font-[700]">Tổng tiền:</b>
                    <b class="text-[#df453e] font-[600] text-[20px] text-[df453e] tracking-[1.5px]"><span
                            class="total-price">{{ number_format(session()->get('total_price') - session()->get('voucher')->discount) }}</span></b>
                </div>
            @else
                <div class="flex justify-between mt-3 mb-8">
                    <b class="text-[22px] font-[700]">Tổng tiền:</b>
                    <b class="text-[#df453e] font-[600] text-[20px] text-[df453e] tracking-[1.5px]"><span
                            class="total-price">{{ number_format(session()->get('total_price')) }}</span></b>
                </div>
            @endif
            <div class="flex justify-center">
                <a href="{{ route('cart.confirm') }}" class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Tiến hành đặt hàng</a>
            </div>
        </form>
    </main>
@endsection
