<?php require_once __DIR__."/header.php"?>
        <!-- banner -->
        <section class="py-10 text-center flex flex-col gap-6 bg-[#335154]">
            <h2 class="text-[#df453e] font-[800] text-[42px]">Shop Fullwidth</h2>
            <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Shop Fullwidth</span></p>
        </section>
        <!-- products -->
        <section class="bg-[#f1f2f2] py-[80px]">
            <h2 class="text-center font-[800] text-[42px] leading-[52px] text-[#335154]">Products</h2>
            <div class="grid grid-cols-4 gap-8 px-8 my-8">
                <?php foreach($products as $pro):?>
                    <div>
                        <a href="./product-detail?id=<?= $pro->id?>">
                            <img class="object-cover" src="./imgs/<?= $pro->image?>" alt="">
                        </a>
                        <div class="flex justify-center">
                            <a href="./product-detail?id=<?= $pro->id?>">
                                <h3 class="text-[20px] font-[800] text-[#335154] mt-3 mb-2"><?= $pro->name?></h3>
                            </a>
                        </div>
                        <div class="flex justify-center">
                            <a href="./product-detail?id=<?= $pro->id?>">
                                <button class="bg-[#df453e] text-white font-normal text-[13px] px-[22px] py-[10px] hover:bg-[#335154] hover:text-[#df453e] rounded">Detail</button>
                            </a>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
            <div class="flex justify-center gap-3">
                <?php for($i = 1; $i <= $count; $i++):?>
                    <a href="./shop?page=<?= $i?>"><input type="submit" value="0<?= $i?>" class="px-3 py-1 bg-white text-red-500 border border-red-500 hover:text-white hover:bg-red-500 cursor-pointer"></a>
                <?php endfor?>
            </div>
        </section>
<?php require_once __DIR__."/footer.php"?>
