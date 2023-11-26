<?php require_once __DIR__."/header.php"?>
        <!-- main -->
        <main class="mt-[64px] px-7 grid grid-cols-3 gap-9">
            <!-- aside -->
            <aside class="border px-8 py-8">
                <form class="relative flex mb-9" action="">
                    <i class="absolute top-[15px] right-[10px] text-red-600 fa-solid fa-magnifying-glass"></i>
                    <input class="flex-[1] border border-red-500 outline-none px-2 py-2 w-[30px]" type="text"
                        placeholder="Search Post...">
                </form>
                <div class="border-b mb-4">
                    <a href="#">
                        <img src="./imgs/blog-01.jpg" alt="">
                    </a>
                    <h3 class="mt-5 mb-3 font-[600] text-[16px]">SURVIVE LONG BIKE ROAD TRIPS</h3>
                    <p class="text-[#ddd] text-[14px] font-[400] mb-5">21 May, 2022 by Katie</p>
                </div>
                <div class="border-b mb-4">
                    <a href="#">
                        <img src="./imgs/blog-02.jpg" alt="">
                    </a>
                    <h3 class="mt-5 mb-3 font-[600] text-[16px]">HOW DO BICYCLES OPERATE?</h3>
                    <p class="text-[#ddd] text-[14px] font-[400] mb-5">28 May, 2022 by Linda</p>
                </div>
                <div class="border-b mb-4">
                    <a href="#">
                        <img src="./imgs/blog-03.jpg" alt="">
                    </a>
                    <h3 class="mt-5 mb-3 font-[600] text-[16px]">A BRIEF HISTORY OF BICYCLING</h3>
                    <p class="text-[#ddd] text-[14px] font-[400] mb-5">02 May, 2022 by Megan</p>
                </div>
                <div class="mb-4">
                    <a href="#">
                        <img src="./imgs/blog-04.jpg" alt="">
                    </a>
                    <h3 class="mt-5 mb-3 font-[600] text-[16px]">TO BIKE OR NOT TO BIKE</h3>
                    <p class="text-[#ddd] text-[14px] font-[400] mb-5">18 May, 2022 by Katie</p>
                </div>
            </aside>
            <!-- article -->
            <article class="col-span-2">
                <section class="border px-8 py-8 mb-[66px]">
                    <a href="#">
                        <img src="./imgs/blog-1.jpg" alt="">
                    </a>
                    <h2 class="text-[#2f2f2f] text-[36px] my-4">Always Look On The Bright Side Of Life</h2>
                    <p class="text-[#777777] text-[14px] leading-[28px] font-[400] mb-5">Ut tempus leo sed magna
                        hendrerit, non congue libero blandit. Vestibulum libero diam, convallis in arcu ut, semper
                        vulputate dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                        cubilia Curae usce luctus fringilla fermentum…</p>
                    <div>
                        <button
                            class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Read
                            More</button>
                    </div>
                </section>
                <section class="border px-8 py-8">
                    <video controls
                        src="./imgs/production ID_4133023.mp4">
                    </video>
                    <h2 class="text-[#2f2f2f] text-[36px] my-4">Philosophy As A Science</h2>
                    <p class="text-[#777777] text-[14px] leading-[28px] font-[400] mb-5">Ut tempus leo sed magna
                        hendrerit, non congue libero blandit. Vestibulum libero diam, convallis in arcu ut, semper
                        vulputate dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                        cubilia Curae usce luctus fringilla fermentum…</p>
                    <div>
                        <button
                            class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Read
                            More</button>
                    </div>
                </section>
            </article>
        </main>
<?php require_once __DIR__."/footer.php"?>