<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Kasir</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- INI FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Wrapper -->
    <div class="flex min-h-screen bg-[#FFF5EB]">

        <!-- Sidebar (Kiri) -->
        <div id="sidebar" class="bg-[#D0C2B0] w-full font-medium text-black p-6 rounded-r-3xl shadow-2xl hidden md:flex md:w-1/4 flex-col justify-between h-screen">
            <div class="mt-5">
                <h1 class="text-2xl text-center">Abang Kasir</h1>
            </div>
            <div class="flex flex-col items-start justify-center flex-grow gap-4">
                <a onclick="tab('dashboard')" class="flex items-center gap-2 py-10 px-4 rounded-l-full rounded-tr-full hover:bg-[#FFF5EB] w-full">
                    <img src="/icon/home.png" alt="Dashboard" class="h-6 w-6 md:ml-4"> 
                    <span class="text-sm md:text-2xl">Dashboard</span>
                </a>
                <a onclick="tab('transaksi')" class="flex items-center gap-2 py-10 px-4 rounded-l-full rounded-tr-full hover:bg-[#FFF5EB] w-full">
                    <img src="/icon/order.png" alt="Transaksi" class="h-6 w-6 md:ml-4"> 
                    <span class="text-sm md:text-2xl">Transaksi</span>
                </a>
                <a onclick="tab('produk')" class="flex items-center gap-2 py-10 px-4 rounded-l-full rounded-tr-full hover:bg-[#FFF5EB] w-full">
                    <img src="/icon/stok.png" alt="Produk" class="h-6 w-6 md:ml-4"> 
                    <span class="text-sm md:text-2xl">Produk</span>
                </a>
                <a href="{{ route('logout') }}" class="flex items-center gap-2 py-10 px-4 rounded-l-full rounded-tr-full hover:bg-[#FFF5EB] w-full"
                    onclick="logout()">
                    <img src="/icon/logout.png" alt="Logout" class="h-6 w-6 md:ml-4"> 
                    <span class="text-sm md:text-2xl">Logout</span>
                </a>
            </div>
        </div>

        <!-- Main Content (Kanan) -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="px-4 py-3 flex items-center justify-between md:hidden">
                <h1 class="text-xl font-bold">Dashboard Kasir</h1>
                <button onclick="toggleSidebar()" class="text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                </button>
            </header>

            <!-- Konten -->
            <main class="p-6">
                <div id="dashboard" class="tab-content">
                    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Sistem Kasir</h2>
                    <p>Ini adalah isi konten untuk kasir.</p>
                </div>
                <div id="transaksi" class="tab-content hidden">
                    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Sistem Kasir</h2>
                    <p>Ini adalah isi konten untuk transaksi.</p>
                </div>
                <div id="produk" class="tab-content hidden">
                    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Sistem Kasir</h2>
                    <p>Ini adalah isi konten untuk produk.</p>
                </div>
            </main>
        </div>
    </div>

    <!-- Form tersembunyi untuk logout-->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- Optional Sidebar Toggle Script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }
        function tab(tabId) {
            const tabs = document.querySelectorAll('.tab-content')
            tabs.forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabId).classList.remove('hidden');
        }
        function logout() {
            event.preventDefault(); 
            document.getElementById('logout-form').submit();
        }
    </script>
</body>
</html>