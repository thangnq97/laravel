<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('assets/js/tailwind.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- container -->
    <div class="max-w-[1440px] mx-auto">
        <!-- header -->
        <header class="px-7 py-5 flex justify-between items-center">
            <a href="./">
                <img src="./imgs/logo.png" alt="">
            </a>
            <div class="flex gap-10">
                <nav class="flex gap-5">
                    <ul class="flex gap-8">
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./">Home</a></li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./pages">Pages</a></li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./shop?page=1">Shop</a></li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./blog">Blog</a></li>
                        <?php if(isset($_SESSION['user'])):?>
                            <li><a class="text-[18px] font-semibold hover:text-red-500" href="./history">History</a></li>
                        <?php endif?>
                    </ul>
                    <a href="./cart" class="cursor-pointer">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </nav>
                <ul class="flex gap-4">
                    <?php if(!isset($_SESSION['user'])):?>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./sign-in">Sign in</a></li>
                    <?php endif?>
                    <?php if(isset($_SESSION['user'])):?>
                        <?php if(($_SESSION['user']['role'] === 'admin')):?>
                            <li><a class="text-[18px] font-semibold hover:text-red-500" href="./admin">Admin</a></li>
                        <?php endif?>
                    <?php endif?>
                    <?php if(isset($_SESSION['user'])):?>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="./sign-out">Sign out</a></li>
                    <?php endif?>
                </ul>
            </div>
        </header>