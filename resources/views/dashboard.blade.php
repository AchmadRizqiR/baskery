<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FFF5EB]">
    <nav class="bg-white shadow-lg w-full px-6 py-5 fixed top-0 left-0 z-50 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="/images/logo.png" alt="Logo" class="h-10">
            <span class="font-bold text-2xl">BasKery</span>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-8 font-semibold">
            <a href="#" class="hover:text-orange-500 text-xl">Home</a>
            <a href="#" class="hover:text-orange-500 text-xl">About Us</a>
            <a href="#" class="hover:text-orange-500 text-xl">Blog</a>
            <a href="#" class="hover:text-orange-500 text-xl">Contact</a>
        </div>

        <!-- Cart & Menu Icon -->
        <div class="flex items-center space-x-3">
            <!-- Cart Icon with Badge -->
            <div class="relative">
                <a href="#">
                    <img src="/icon/keranjang.svg" alt="keranjang">
                </a>
            </div>
            <form method="POST" action="{{route('logout')}}" class="hidden md:flex items-center justify-center">
                @csrf
                <button type="submit"><img src="/icon/logout.png" class="h-6 w-6" alt="logout"></button>
            </form>
            <!-- Hamburger Menu (mobile) -->
            <button class="md:hidden focus:outline-none" onclick="menu()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
        </div>

        <!-- Dropdown Menu Mobile -->
        <div id="mobile-menu" class="md:hidden hidden flex flex-col bg-white shadow-lg px-6 py-4 space-y-4 absolute top-[70px] left-0 w-full z-40">
            <a href="#" class="text-xl font-semibold hover:text-orange-500">Home</a>
            <a href="#" class="text-xl font-semibold hover:text-orange-500">About Us</a>
            <a href="#" class="text-xl font-semibold hover:text-orange-500">Blog</a>
            <a href="#" class="text-xl font-semibold hover:text-orange-500">Contact</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xl font-semibold hover:text-orange-500">Logout</button>
            </form>
        </div>
    </nav>
    
    <div class="flex relative top-20 md:relative md:top-[76px] bg-no-repeat bg-center bg-cover aspect-[5760/2764] w-full justify-center items-center" style="background-image: url('{{ asset('images/bg-dashboard.png') }}');">
        <h2 class="text-center text-xl md:absolute md:text-left font-bold md:text-7xl md:top-[40%] md:left-[15%] text-white" style="font-family: 'Fredoka', sans-serif;">
            404: Hunger Not Found <br> setelah makan roti ini
        </h2>
    </div>
    <!-- Search -->
    <div class="flex mt-[76px] h-28 justify-center items-center">
        <h2 class="text-center text-2xl font-extrabold">SEARCH DI SINI NANTINYA</h2>
    </div>
    <div class="min-h-max">
        <!-- Best -->
        <div class="flex flex-col min-h-96 max-h-max rounded-b-3xl justify-center items-center bg-[#D0C2B0] pb-10">
            <h2 class="text-xl mt-6 md:text-4xl font-medium" style="font-family: 'Fredoka', sans-serif;">Best Seller</h2>
            <!-- Logic looping untuk menampilkan produk -->
            <!-- Card -->
            <div class="flex flex-wrap w-full justify-evenly mt-8 md:mt-12">
                @foreach ($bestSellers as $product)
                    <div class="bg-white w-36 mb-5 md:w-64 rounded-3xl shadow-2xl flex flex-col overflow-hidden">
                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}"
                            class="w-full min-h-min md:h-56 object-cover rounded-3xl mb-2" />
                        <div class="flex items-center justify-start pl-4">
                            @php
                                $rating = round($product->reviews_avg_rating); // Bulatkan ke angka terdekat
                                $count = $product->reviews_count;
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $rating)
                                    <span class="text-yellow-400 text-xl">&#9733;</span> {{-- Bintang penuh --}}
                                @else
                                    <span class="text-gray-300 text-xl">&#9733;</span> {{-- Bintang kosong --}}
                                @endif
                            @endfor
                            <sup class="text-gray-600 text-xs ml-1 align-super">({{ $count }})</sup>
                        </div>
                        <div class="p-4 flex flex-col flex-grow text-left">
                            <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                            <p class="text-xs md:mb-4 text-gray-500">{{ $product->description }}</p>

                            <div class="flex justify-between items-center">
                                <p class="text-sm font-bold text-red-500">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="#">
                                    <div class="bg-gray-200 rounded-full p-2">
                                        <img src="/icon/keranjang.svg" alt="keranjang" class="h-5 w-5" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Semua Menu -->
        <h2 class="text-xl mt-6 md:text-4xl font-medium text-center" style="font-family: 'Fredoka', sans-serif;">Semua Menu</h2>
        <div class="flex flex-wrap min-h-min w-full justify-evenly mt-8 md:mt-12">
            @foreach ($allProducts as $product)
                <div class="bg-white w-36 mb-10 md:w-64 rounded-3xl shadow-2xl flex flex-col overflow-hidden">
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}"
                        class="w-full min-h-min md:h-56 object-cover rounded-3xl mb-2" />
                        <div class="flex items-center justify-start pl-4">
                        @php
                            $rating = round($product->reviews_avg_rating); // Bulatkan ke angka terdekat
                            $count = $product->reviews_count;
                        @endphp

                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $rating)
                                <span class="text-yellow-400 text-xl">&#9733;</span> {{-- Bintang penuh --}}
                            @else
                                <span class="text-gray-300 text-xl">&#9733;</span> {{-- Bintang kosong --}}
                            @endif
                        @endfor
                        <sup class="text-gray-600 text-xs ml-1 align-super">({{ $count }})</sup>
                    </div>
                    <div class="p-4 flex flex-col flex-grow text-left">
                        <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                        <p class="text-xs md:mb-4 text-gray-500">{{ $product->description }}</p>

                        <div class="flex justify-between items-center">
                            <p class="text-sm font-bold text-red-500">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="#">
                                <div class="bg-gray-200 rounded-full p-2">
                                    <img src="/icon/keranjang.svg" alt="keranjang" class="h-5 w-5" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function menu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>
</body>
</html>