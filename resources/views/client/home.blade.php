@extends('client.layout')

@section('content')
    <!-- banner -->
    <section class="bg-[#f1f2f1] grid grid-cols-5 gap-10 px-2 py-7">
        <div class="col-span-3">
            <img class="object-cover w-full" src="{{ asset('assets/img/slideshow_3.webp') }}" alt="">
        </div>
        <div class="flex flex-col justify-center col-span-2">
            <h2 class="text-[40px] font-[800] text-[#335154] leading-[50px] tracking-[3px] mb-8">Mach City 7 Clothes
            </h2>
            <div class="flex gap-10">
                <div class="flex flex-col gap-4">
                    <p class="text-[18px] font-bold leading-[24px] text-[#335154]"> <span><i
                                class="text-red-500 fa-solid fa-check"></i></span> 17t, 21 frame height</p>
                    <p class="text-[18px] font-bold leading-[24px] text-[#335154]"> <span><i
                                class="text-red-500 fa-solid fa-check"></i></span> 26t wheel size</p>
                    <p class="text-[18px] font-bold leading-[24px] text-[#335154]"> <span><i
                                class="text-red-500 fa-solid fa-check"></i></span> 7 speed transmission</p>
                </div>
                <div class="flex flex-col gap-4">
                    <p class="text-[18px] font-bold leading-[24px] text-[#335154]"> <span><i
                                class="text-red-500 fa-solid fa-check"></i></span> Paved road</p>
                    <p class="text-[18px] font-bold leading-[24px] text-[#335154]"> <span><i
                                class="text-red-500 fa-solid fa-check"></i></span> Light weight steel frame</p>
                    <p class="text-[18px] font-bold leading-[24px] text-[#335154]"> <span><i
                                class="text-red-500 fa-solid fa-check"></i></span> Steel rigid fork</p>
                </div>
            </div>
            <div class="mt-10 flex items-center gap-10">
                <h2 class="text-[43px] leading-[52px] font-bold text-[#df453e]">$ 1.500</h2>
                <div>
                    <button
                        class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Shop
                        Now</button>
                </div>
            </div>
        </div>
    </section>
    <!-- contact 1-->
    <section class="grid grid-cols-4">
        <div class="flex flex-col gap-3 items-center py-9 border-r">
            <a class="flex justify-center" href="#">
                <img class="w-[100px] h-[100px]" src="{{ asset('assets/img/home.2.1.png') }}" alt="">
            </a>
            <h3 class="text-[24px] font-[800] text-[#335154] px-5 my-4 max-w-[200px] text-center tracking-[1px]">
                Saddle Personal Fitting</h3>
            <p class="text-[16px] font-[400] leading-[24px] text-[#393939] max-w-[220px] text-center">Individual
                saddle fitting according to your height and weight.</p>
            <p class="text-[#df453e] text-[16px] font-[600] leading-[22px]">Read more</p>
        </div>
        <div class="flex flex-col gap-3 items-center py-9 border-r">
            <a class="flex justify-center" href="#">
                <img class="w-[100px] h-[100px]" src="{{ asset('assets/img/home.2.2.png') }}" alt="">
            </a>
            <h3 class="text-[24px] font-[800] text-[#335154] px-5 my-4 max-w-[200px] text-center tracking-[1px]">
                Spare Parts Exchange</h3>
            <p class="text-[16px] font-[400] leading-[24px] text-[#393939] max-w-[220px] text-center">Have spare
                parts and want to sell or exchange them? Come and see!</p>
            <p class="text-[#df453e] text-[16px] font-[600] leading-[22px]">Read more</p>
        </div>
        <div class="col-span-2 flex flex-col items-center justify-center gap-7">
            <h2 class="max-w-[480px] text-[36px] leading-[46px] font-[800] text-[#335154]">Subscribe to our
                newsletter about new products</h2>
            <form class="flex" action="">
                <input class="w-[290px] h-[60px] pl-[27px] py-[15px] border-2 border-[e2e7e7] bg-[#f6f7f7]"
                    placeholder="Your email address..." required type="email">
                <input class="w-[120px] h-[60px] bg-[#335154] text-[#5d6b6d] text-[16px] font-[500] cursor-pointer"
                    type="submit" value="Subcribe now">
            </form>
        </div>
    </section>
    <!-- new arrivals -->
    <section class="bg-[#f1f2f2] py-[80px]">
        <h2 class="text-center font-[800] text-[42px] leading-[52px] text-[#335154]">Discover our new arrivals</h2>
        <div class="grid grid-cols-4 gap-8 px-8 my-8">
            @foreach ($new8 as $item)
                <div>
                    <a href="">
                        <img class="object-cover" src="{{asset('assets/img/'.$item->image)}}" alt="">
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
    </section>
    <!-- contact 2-->
    <section class="grid grid-cols-4">
        <div class="col-span-2 flex flex-col items-center justify-center bg-red-500 gap-5">
            <h2 class="text-[36px] font-[800] leading-[46px] tracking-[1px] max-w-[500px] text-white">Get -20% for all BMX
                bikes & accessories</h2>
            <input
                class="bg-[#335154] text-white px-[36px] py-[18px] cursor-pointer text-[18px] font-[600] hover:text-black hover:bg-red-600"
                type="submit" value="Get Your Promocode">
        </div>
        <div class="flex flex-col items-center gap-6 py-8">
            <a href="#">
                <img class="w-[100px] h-[100px] object-cover" src="{{ asset('assets/img/screwdriver.png') }}"
                    alt="">
            </a>
            <h3 class="text-[24px] font-[800] text-[#335154] px-5 my-4 max-w-[200px] text-center tracking-[1px]">Clothes
                Repair Workshop</h3>
            <p class="text-[16px] font-[400] leading-[24px] text-[#393939] max-w-[220px] text-center">Clothes restoration
                after collisions of any severity, including complete rebuilding.</p>
            <p class="text-[#df453e] text-[16px] font-[600] leading-[22px]">Read more</p>
        </div>
        <div class="flex flex-col items-center gap-6 py-8 bg-[#335154]">
            <a href="#">
                <img class="w-[100px] h-[100px] object-cover" src="{{ asset('assets/img/gear.png') }}" alt="">
            </a>
            <h3 class="text-[24px] font-[800] text-white px-5 my-4 max-w-[200px] text-center tracking-[1px]">Clothes Repair
                Workshop</h3>
            <p class="text-[16px] font-[400] leading-[24px] text-[#A3B4B7] max-w-[220px] text-center">Bicycle Clothes after
                collisions of any severity, including complete rebuilding.</p>
            <p class="text-[#df453e] text-[16px] font-[600] leading-[22px]">Read more</p>
        </div>
    </section>
    <!-- bestsellers -->
    <section class="bg-[#f1f2f2] py-[80px]">
        <h2 class="text-center font-[800] text-[42px] leading-[52px] text-[#335154]">Our bestsellers</h2>
        <div class="grid grid-cols-4 gap-8 px-8 my-8">
            @foreach ($top8 as $item)
                <div>
                    <a href="">
                        <img class="object-cover" src="{{ asset('assets/img/'.$item->image) }} " alt="">
                    </a>
                    <div class="flex justify-center">
                        <a href=""><h3 class="text-[20px] font-[800] text-[#335154] mt-3 mb-2">{{ $item->name }}</h3></a>
                    </div>
                    <div class="flex justify-center">
                        <a href="">
                            <button class="bg-[#df453e] text-white font-normal text-[13px] px-[22px] py-[10px] hover:bg-[#335154] hover:text-[#df453e] rounded">Detail</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center mt-[50px]">
            <a href="./shop?page=1"><button
                    class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">View
                    Other Products</button></a>
        </div>
    </section>
    <!-- banner 2 -->
    <section class="bg-[#335154] grid grid-cols-5 gap-10 px-[50px] py-6">
        <a href="#">
            <img src="{{ asset('assets/img/bicycle-01.png') }}" alt="">
        </a>
        <a href="#">
            <img src="{{ asset('assets/img/bicycle-02.png') }}" alt="">
        </a>
        <a href="#">
            <img src="{{ asset('assets/img/bicycle-03.png') }}" alt="">
        </a>
        <a href="#">
            <img src="{{ asset('assets/img/bicycle-04.png') }}" alt="">
        </a>
        <a href="#">
            <img src="{{ asset('assets/img/bicycle-05.png') }}" alt="">
        </a>
    </section>
@endsection
