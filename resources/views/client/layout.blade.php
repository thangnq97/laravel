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
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="{{ route('home') }}">Home</a>
                        </li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500"
                                href="{{ route('pages') }}">Pages</a></li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="{{ route('blog') }}">Blog</a>
                        </li>
                        @if (Auth::check())
                            <li><a class="text-[18px] font-semibold hover:text-red-500" href="./history">History</a>
                            </li>
                        @endif
                    </ul>
                    <a href="{{ route('cart') }}" class="cursor-pointer">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </nav>
                <ul class="flex gap-4">
                    @if (Auth::check())
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="{{ route('logout') }}">Sign
                                out</a></li>
                    @else
                        <li><a class="text-[18px] font-semibold hover:text-red-500" href="{{ route('login') }}">Sign
                                in</a></li>
                    @endif
                </ul>
            </div>
        </header>

        @yield('content')

        <!-- footer -->
        <footer class="mt-[64px] px-8 py-[64px] bg-[#335154] grid grid-cols-4 gap-6">
            <div>
                <a href="#">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
                <div class="flex mt-3 gap-4 ml-5">
                    <i class="text-red-500 fa-brands fa-facebook"></i>
                    <i class="text-red-500 fa-brands fa-twitter"></i>
                    <i class="text-red-500 fa-brands fa-square-instagram"></i>
                </div>
            </div>
            <div>
                <h3 class="text-[18px] font-[600] tracking-[1px] text-white">Want To Call With Us?</h3>
                <div class="flex mt-3 gap-3 items-center">
                    <i class="text-red-500 fa-solid fa-phone"></i>
                    <p class="text-[#97adaf]">(+84) 344-750-590</p>
                </div>
            </div>
            <div>
                <h3 class="text-[18px] font-[600] tracking-[1px] text-white">Want To Email With Us?</h3>
                <div class="flex mt-3 gap-3 items-center">
                    <i class="text-red-500 fa-solid fa-envelope"></i>
                    <p class="text-[#97adaf]">thangnqph28950@fpt.edu.vn</p>
                </div>
            </div>
            <div>
                <h3 class="text-[18px] font-[600] tracking-[1px] text-white">Want To Visit Us?</h3>
                <div class="flex mt-3 gap-3 items-center">
                    <i class="text-red-500 fa-sharp fa-solid fa-location-dot"></i>
                    <p class="text-[#97adaf]">Trịnh Văn Bô - Hà Nội.</p>
                </div>
            </div>
        </footer>
    </div>
    @yield('script')
</body>

</html>
