<?php require_once __DIR__."/header.php"?>
        <!-- banner -->
        <section class="py-10 text-center flex flex-col gap-5 bg-[#335154]">
            <h2 class="text-[#df453e] font-[800] text-[42px]">Product detail</h2>
            <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Product detail</span></p>
        </section>
        <!-- main -->
        <main class="bg-[#f0f2f2] grid grid-cols-2 px-[50px] py-[69px]">
            <div>
                <img src="./imgs/<?= $product->image?>" alt="">
            </div>
            <div class="py-5 px-4 flex flex-col gap-[50px] justify-center">
                <div class="flex flex-col gap-[22px]">
                    <h3 class="text-[43px] font-[700] tracking-[1.5px] text-[#1b3e41]"><?= number_format($price)?></h3>
                    <p class="text-[16px] font-[400] leading-[24px] text-[#393939] "><?= $product->detail?></p>
                </div>
                <form action="./add-cart" method="POST" class="flex flex-col gap-[32px]">
                    <input type="hidden" name="product_id" value="<?= $product->id?>">
                    <div class="flex gap-5 items-center ">
                        <select class="w-[150px] h-[30px]" name="color_id" id="color">
                            <?php foreach($colors as $color):?>
                                <option value="<?= $color->id?>"><?= $color->name?></option>
                            <?php endforeach?>
                        </select>
                        <div class="color-render w-[150px] h-[60px] bg-[#60A5FA]"></div>
                    </div>
                    <div class="flex gap-5 items-center">
                        <div class="flex gap-3">
                            <input name="quantity" class="quantity item1_input border w-[40px] outline-none border-orange-400 text-center text-[20px]" type="number" value="1">
                        </div>
                        <?php if($check):?>
                            <div>
                                <button type="submit" class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Đặt hàng</button>
                            </div>
                            <?php else:?>
                                <h4 class="font-semibold text-[18px] text-red-500">Hết hàng</h4>
                            <?php endif?>
                    </div>
                </form>
            </div>
            
            <!-- js -->
            <script>
                let data = <?php echo json_encode($colors);?>;
                // data = Array.from(data);
                console.log(data);


                // render color

                const color = document.querySelector('#color');
                const colorRender = document.querySelector('.color-render');
                const quantity = document.querySelector('.quantity');

                color.addEventListener('change', (e) => {
                    
                    data.forEach((item) => {
                        if(item.id == e.target.value) {
                            var color_target = item.hex;
                        }
                        colorRender.style.backgroundColor = `${color_target}`;
                    })
                })

                // handler quantity
                quantity.addEventListener('change', (e) => {
                    if(e.target.value <= 0) {
                        quantity.value = 1;
                    }
                })

            </script>
            <!-- end js -->

        </main>
        <section class="bg-[#f0f2f2] flex flex-col gap-8 mt-[50px]">
            <div class="flex flex-col gap-7 mt-5 mb-6 ml-5">
                <?php foreach($comments as $cmt):?>
                    <div class="flex flex-col gap-3">
                        <h6 class="text-red-400 font-[500] text-[18px]">
                            <?php foreach($users as $user) {
                                echo ($cmt->user_id === $user->id) ? $user->username : '';
                            }?>
                        </h6>
                        <p class="text-black font-[300] text-[15px]"><?= $cmt->create_at?></p>
                        <p class="text-black font-[300] text-[15px]"><?= $cmt->content?></p>
                    </div>
                <?php endforeach?>
            </div>
            <?php if(isset($_SESSION['user'])):?>
                <form action="./add-comment" class=" mt-5 mb-6 ml-5 flex gap-4" method="POST">
                    <input type="hidden" value="<?= $product->id?>" name="product_id">
                    <textarea class="outline-none focus:outline-blue-400 rounded" name="content" id="" cols="40" rows="5" required></textarea>
                    <div class="flex items-center"><input class="px-[10px] py-[5px] bg-[#df453e] text-white hover:bg-[#335154] hover:text-[#df453e] rounded" type="submit" value="submit"></div>
                </form>
            <?php endif?>
        </section>
<?php require_once __DIR__."/footer.php"?>