@extends('client.layout')

@section('content')
    <!-- banner -->
    <section class="py-10 text-center flex flex-col gap-6 bg-[#335154]">
        <h2 class="text-[#df453e] font-[800] text-[42px]">Shop Fullwidth</h2>
        <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Shop Fullwidth</span></p>
    </section>
    <!-- products -->
    <section class="bg-[#f1f2f2] py-[80px]">
        <h2 class="text-center font-[800] text-[42px] leading-[52px] text-[#335154]">Products</h2>
        <div class="grid grid-cols-4 gap-8 px-8 my-8">
            @foreach ($products as $item)
                <div>
                    <a href="">
                        <img class="object-cover" src="{{ asset('assets/img/'.$item->image) }}" alt="">
                    </a>
                    <div class="flex justify-center">
                        <a href="">
                            <h3 class="text-[20px] font-[800] text-[#335154] mt-3 mb-2">{{ $item->name }}</h3>
                        </a>
                    </div>
                    <div class="flex justify-center">
                        <a href="">
                            <button class="bg-[#df453e] text-white font-normal text-[13px] px-[22px] py-[10px] hover:bg-[#335154] hover:text-[#df453e] rounded">Detail</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center gap-3">
            {{ $products->links() }}
        </div>
    </section>
@endsection