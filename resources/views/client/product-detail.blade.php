@extends('client.layout')

@section('content')
    <!-- banner -->
    <section class="py-10 text-center flex flex-col gap-5 bg-[#335154]">
        <h2 class="text-[#df453e] font-[800] text-[42px]">Product detail</h2>
        <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Product detail</span></p>
    </section>
    <!-- main -->
    <main class="bg-[#f0f2f2] grid grid-cols-2 px-[50px] py-[69px]">
        <div>
            <img src="{{ asset('assets/img/'.$product->image) }}" alt="" width="400">
        </div>
        <div class="py-5 px-4 flex flex-col gap-[50px] justify-center">
            <div class="flex flex-col gap-[22px]">
                <h3 class="text-[43px] font-[700] tracking-[1.5px] text-[#1b3e41]">{{ $product->name }}</h3>
                <p class="text-[16px] font-[400] leading-[24px] text-[#393939] ">{{ $product->detail }}</p>
            </div>
            <form action="{{ route('cart.store') }}" method="POST" class="flex flex-col gap-[32px]">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="flex gap-5 items-center ">
                    <div>
                        <label for="">Chọn màu</label>
                        <select class="w-[150px] h-[30px]" name="color_id" id="color_id">
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Chọn size</label>
                        <select class="w-[150px] h-[30px]" name="size_id" id="size_id">
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex gap-5 items-center">
                    <div class="flex gap-3">
                        <input name="quantity"
                            class="quantity item1_input border w-[40px] outline-none border-orange-400 text-center text-[20px]"
                            type="number" value="1">
                    </div>
                    
                    @if(count($variants))
                    <div>
                        <button type="submit"
                            class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Đặt
                            hàng</button>
                    </div>
                    @else
                    <h4 class="font-semibold text-[18px] text-red-500">Hết hàng</h4> 
                        
                    @endif
                    
                    @if (session()->has('yes'))
                        <h6 class="font-semibold text-[18px] text-red-500">{{ session()->get('yes') }}</h6>
                    @endif
                    @if (session()->has('no'))
                        <h6 class="font-semibold text-[18px] text-red-500">{{ session()->get('no') }}</h6>
                    @endif
                </div>
            </form>
        </div>

    </main>
    <section class="bg-[#f0f2f2] flex flex-col gap-8 mt-[50px]">
        <div class="flex flex-col gap-7 mt-5 mb-6 ml-5">
            @foreach ($comments as $cmt)
                <div class="flex flex-col gap-3">
                    <h6 class="text-red-400 font-[500] text-[18px]">{{ $cmt->user->name }}</h6>
                    <p class="text-black font-[300] text-[15px]">{{ $cmt->content }}</p>
                    <p class="text-black font-[300] text-[15px]">{{ $cmt->created_at }}</p>
                </div>
            @endforeach
        </div>
        @if (Auth::check())
            <form action="" class=" mt-5 mb-6 ml-5 flex gap-4" method="POST">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <textarea class="outline-none focus:outline-blue-400 rounded" name="content" id="" cols="40"
                    rows="5" required></textarea>
                <div class="flex items-center"><input
                        class="px-[10px] py-[5px] bg-[#df453e] text-white hover:bg-[#335154] hover:text-[#df453e] rounded"
                        type="submit" value="submit"></div>
            </form>
        @endif
    </section>
@endsection
@section('script')
    <script>
        const quantity = document.querySelector('.quantity');

        quantity.addEventListener('change', function(e) {
            if(e.target.value == 0) quantity.value = 1;
        })
    </script>
@endsection
