@extends('client.layout')

@section('content')
    <!-- banner -->
    <section class="py-10 text-center flex flex-col gap-6 bg-[#335154]">
        <h2 class="text-[#df453e] font-[800] text-[42px]">About us</h2>
        <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Page</span></p>
    </section>
    <!-- educate  -->
    <section class="my-9 grid grid-cols-5 gap-6">
        <div class="col-span-3 flex flex-col gap-5 px-6 justify-center">
            <h3 class="text-[42px] leading-[52px] font-[500]">We educate the public about the bicycle riding</h3>
            <p class="text-[#393939] text-[16px] font-[400]">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore.</p>
            <div class="flex flex-col gap-3">
                <div class="flex gap-2 items-center">
                    <i class="text-red-600 fa-solid fa-circle-check"></i>
                    <p class="text-[#393939] text-[14px] font-[400]">Edquia numquam tempora incidunt ut labore et dolore
                        magnam</p>
                </div>
                <div class="flex gap-2 items-center">
                    <i class="text-red-600 fa-solid fa-circle-check"></i>
                    <p class="text-[#393939] text-[14px] font-[400]">Exercitationem ullam corporis suscipit laboriosam
                        volupatem</p>
                </div>
                <div class="flex gap-2 items-center">
                    <i class="text-red-600 fa-solid fa-circle-check"></i>
                    <p class="text-[#393939] text-[14px] font-[400]">Imilique sunt in culpa qui officia deserunt mollitia
                        animi</p>
                </div>
                <div class="flex gap-2 items-center">
                    <i class="text-red-600 fa-solid fa-circle-check"></i>
                    <p class="text-[#393939] text-[14px] font-[400]">Exercitationem ullam corporis suscipit laboriosam</p>
                </div>
            </div>
            <div>
                <button
                    class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Read
                    More</button>
            </div>
        </div>
        <div class="px-6 col-span-2">
            <img class="object-cover" src="{{ asset('assets/img/educate.jpg') }}" alt="">
        </div>
    </section>
    <!-- statistical -->
    <section class="py-10 px-[52px] bg-[#335154] grid grid-cols-4">
        <div class="flex flex-col gap-3 justify-center items-center border-r">
            <h2 class="text-[42px] font-[600] leading-[52px] text-white">1399</h2>
            <p class="font-[400] text-[16px] text-white">SUCCESS STORIES</p>
        </div>
        <div class="flex flex-col gap-3 justify-center items-center border-r">
            <h2 class="text-[42px] font-[600] leading-[52px] text-white">745</h2>
            <p class="font-[400] text-[16px] text-white">HAPPY CUSTOMERS</p>
        </div>
        <div class="flex flex-col gap-3 justify-center items-center border-r">
            <h2 class="text-[42px] font-[600] leading-[52px] text-white">97</h2>
            <p class="font-[400] text-[16px] text-white">BIKE AWARDS</p>
        </div>
        <div class="flex flex-col gap-3 justify-center items-center">
            <h2 class="text-[42px] font-[600] leading-[52px] text-white">78</h2>
            <p class="font-[400] text-[16px] text-white">GIFT COLLECTIONS</p>
        </div>
    </section>
    <!-- our team -->
    <section class="my-[64px] px-7">
        <h2 class="text-[42px] text-[#335154] font-[800] leading-[52px] mb-6 text-center">Meet our expert Team</h2>
        <div class="grid grid-cols-4 gap-5">
            <div class="bg-[#335154] flex flex-col items-center px-5 py-5">
                <a href="#">
                    <img src="{{ asset('assets/img/team-1.jpg') }}" alt="">
                </a>
                <h3 class="text-[26px] font-[500] text-[#df453e] mt-5 mb-3">Mr. Mike Banding</h3>
                <p class="text-[15px] font-[400]">Manager</p>
            </div>
            <div class="bg-[#335154] flex flex-col items-center px-5 py-5">
                <a href="#">
                    <img src="{{ asset('assets/img/team-2.jpg') }}" alt="">
                </a>
                <h3 class="text-[26px] font-[500] text-[#df453e] mt-5 mb-3">Mr. Peter Pan</h3>
                <p class="text-[15px] font-[400]">Developer</p>
            </div>
            <div class="bg-[#335154] flex flex-col items-center px-5 py-5">
                <a href="#">
                    <img src="{{ asset('assets/img/team-3.jpg') }}" alt="">
                </a>
                <h3 class="text-[26px] font-[500] text-[#df453e] mt-5 mb-3">Ms. Sophia</h3>
                <p class="text-[15px] font-[400]">Designer</p>
            </div>
            <div class="bg-[#335154] flex flex-col items-center px-5 py-5">
                <a href="#">
                    <img src="{{ asset('assets/img/team-4.jpg') }}" alt="">
                </a>
                <h3 class="text-[26px] font-[500] text-[#df453e] mt-5 mb-3">Mr. John Lee</h3>
                <p class="text-[15px] font-[400]">Chairmen</p>
            </div>
        </div>
    </section>
@endsection
