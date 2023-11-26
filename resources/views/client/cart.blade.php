<?php require_once __DIR__."/header.php"?>
        <!-- banner -->
        <section class="py-10 text-center flex flex-col gap-5 bg-[#335154]">
            <h2 class="text-[#df453e] font-[800] text-[42px]">Shopping cart</h2>
            <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ Cart</span></p>
        </section>
        <!-- main -->
        <main class="grid grid-cols-2 gap-8 px-7">
            <!-- product -->
            <section class="flex flex-col gap-5 px-6 py-6">
                <?php foreach($data as $k => $v):?>
                    <div class="grid grid-cols-4 border-b">
                        <a href="">
                            <img src="./imgs/<?php foreach($products as $pro){echo ($pro->id === $v['product_id']) ? $pro->image : '';}?>" class="w-[110px] h-[110px]" alt="">
                        </a>
                        <div class="col-span-3 flex flex-col justify-center ">
                            <h4 class="text-[14px] font-[600] text-[#335154] mt-3 mb-2">
                                <?php foreach($products as $pro) {
                                    echo ($pro->id === $v['product_id']) ? $pro->name : '';
                                }?>
                            </h4>
                            <div class=" flex justify-between">
                                <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]"><?= number_format($v['price'])?> | <?php foreach($colors as $color){echo ($color->id === $v['color_id']) ? $color->name : '';}?></p>
                                <div class="flex items-center gap-8">
                                    <p class="text-[#000] font-[600] text-[18px] text-[df453e] tracking-[1.5px]">x<?= $v['quantity']?></p>
                                    <a onclick="return confirm('are you sure?')" href="./remove-cart?key=<?= $k?>" class="bg-[#df453e] text-white font-normal text-[15px] px-[8px] py-[4px] hover:bg-[#335154] hover:text-[#df453e] rounded">xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </section>
            <!-- order -->
            <form class="border-l px-6 py-6" method="POST" action="./confirm">
                <h3 class="text-center text-[24px] font-[600] uppercase mb-5">Tóm tắt đơn hàng</h3>
                <div class="flex justify-between mb-3">
                    <p class="text-[14px] font-[600]">Tổng giá trị sản phẩm:</p>
                    <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]"><span class="price"><?= $total_price?></span></p>
                </div>
                <div class="flex justify-between mb-3">
                    <p class="text-[14px] font-[600]">Phí vận chuyển:</p>
                    <p class="text-[#df453e] font-[600] text-[12px] text-[df453e] tracking-[1.5px]">Miễn phí</p>
                </div>
                <div class="flex justify-between mb-3">
                    <p class="text-[14px] font-[600]">Chọn voucher:</p>
                    <select class="voucher border border-[$ccc] w-[150px] h-[30px] focus:border-blue-500 rounded text-center" name="voucher_id" id="voucher">
                        <option value="0">--Voucher--</option>
                        <?php foreach($vouchers as $voucher):?>
                            <option value="<?= $voucher->id?>"><?= $voucher->name?></option>
                        <?php endforeach?>
                    </select>
                </div>
            <hr>
                <div class="flex justify-between mt-3 mb-8">
                    <b class="text-[22px] font-[700]">Tổng tiền:</b>
                    <b class="text-[#df453e] font-[600] text-[20px] text-[df453e] tracking-[1.5px]"><span class="total-price"><?= $total_price?></span></b>
                </div>
                <div class="flex justify-center">
                    <a href="./confirm"><button type="submit" class="bg-[#df453e] text-white font-semibold text-[18px] px-[36px] py-[18px] hover:bg-[#335154] hover:text-[#df453e] rounded">Tiến hành đặt hàng</button></a>
                </div>
            </form>
        </main>

        <!-- js -->
        <script>
            let data = <?php echo json_encode($vouchers);?>;
            let price = document.querySelector('.price');
            let voucher = document.querySelector('.voucher');
            let totalPrice = document.querySelector('.total-price');

            voucher.addEventListener('change', () => {
                var discount = data.filter(ele => ele.id == voucher.value);
                // console.log(discount[0].discount);
                if(discount.length > 0) {
                    totalPrice.innerText = Number(price.innerText) - Number(discount[0].discount);
                }else {
                    totalPrice.innerText = price.innerText;
                }
                // console.log(totalPrice.innerText);
            })
        </script>
        <!-- end js -->
<?php require_once __DIR__."/footer.php"?>