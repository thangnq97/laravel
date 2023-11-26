<?php require_once __DIR__."/header.php"?>
<!-- banner -->
<section class="py-10 text-center flex flex-col gap-6 bg-[#335154]">
            <h2 class="text-[#df453e] font-[800] text-[42px]"></h2>
            <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ History</span></p>
</section>
    <div class="flex justify-center">
        <table class="table table-stripped mt-8">
            <thead>
                <tr class="bg-[f1f2f2]">
                    <th class="border uppercase px-4 py-3">ID</th>
                    <th class="border uppercase px-4 py-3">quantity</th>
                    <th class="border uppercase px-4 py-3">color</th>
                    <th class="border uppercase px-4 py-3 w-[260px]">product</th>
                    <th class="border uppercase px-4 py-3">total price</th>
                    <th class="border px-4 py-3">
                        <a class="bg-blue-500 text-white rounded px-2 py-1 hover:text-black hover:bg-red-400" href="./history">back</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $item):?>
                    <tr class="bg-[f1f2f2]">
                        <td class="bg-[f1f2f2] px-4 py-3 border"><?= $item['id']?></td>
                        <td class="bg-[f1f2f2] px-4 py-3 border"><?= $item['quantity']?></td>
                        <td class="bg-[f1f2f2] px-4 py-3 border"><?= $item['color']?></td>
                        <td class="bg-[f1f2f2] px-4 py-3 border"><?= $item['product']?></td>
                        <td class="bg-[f1f2f2] px-4 py-3 border"><?= number_format($item['total_price'])?></td>
                        <td class="bg-[f1f2f2] px-4 py-3 border"></td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>


<?php require_once __DIR__."/footer.php"?>