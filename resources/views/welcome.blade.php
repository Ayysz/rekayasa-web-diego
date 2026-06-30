<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diego Dessert - Indulgence Tanpa Rasa Bersalah</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-pattern {
            background-color: #fdf2f8;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23fbcfe8' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-white selection:bg-pink-300 selection:text-pink-900">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex items-center gap-2">
                        <i class="fas fa-leaf text-pink-500 text-2xl"></i>
                        <span class="font-bold text-2xl tracking-tight text-gray-900">Diego<span class="text-pink-500">Dessert</span></span>
                    </a>
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#home" class="text-gray-600 hover:text-pink-500 font-medium transition-colors">Beranda</a>
                    <a href="#menu" class="text-gray-600 hover:text-pink-500 font-medium transition-colors">Menu Diet</a>
                    <a href="#about" class="text-gray-600 hover:text-pink-500 font-medium transition-colors">Tentang Kami</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-gray-900 text-white px-5 py-2.5 rounded-full font-medium hover:bg-gray-800 transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-pink-500 text-white px-5 py-2.5 rounded-full font-medium hover:bg-pink-600 transition-colors shadow-lg shadow-pink-500/30">Admin Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-pattern pt-32 pb-20 md:pt-48 md:pb-32 px-4">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2 text-center md:text-left">
                <div class="inline-block bg-pink-100 text-pink-700 font-semibold px-4 py-1.5 rounded-full text-sm mb-6 border border-pink-200">
                    🌿 100% Cocok Untuk Diet
                </div>
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                    Manisnya Hidup,<br> Tanpa <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500">Rasa Bersalah.</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-lg mx-auto md:mx-0 leading-relaxed">
                    Nikmati koleksi dessert sehat rendah kalori dari Diego Dessert. Dibuat khusus untuk Anda yang sedang diet namun tetap ingin menikmati kelezatan.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="#menu" class="bg-pink-500 text-white px-8 py-3.5 rounded-full font-bold hover:bg-pink-600 transition-colors shadow-lg shadow-pink-500/30 text-center flex items-center justify-center gap-2">
                        Lihat Menu <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-pink-200 to-purple-200 rounded-full blur-3xl opacity-50"></div>
                <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Healthy Dessert" class="relative z-10 rounded-3xl shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-500 object-cover h-[500px] w-full">
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-20 bg-white px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pilihan Menu Diet Kami</h2>
                <div class="w-24 h-1 bg-pink-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Semua dessert kami dibuat dengan pemanis alami rendah kalori dan bahan-bahan premium yang mendukung program diet Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($desserts ?? [] as $dessert)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow border border-gray-100 overflow-hidden group">
                    <div class="relative h-64 overflow-hidden">
                        @if (filter_var($dessert->gambar, FILTER_VALIDATE_URL))
                            <img src="{{ $dessert->gambar }}" alt="{{ $dessert->nama_dessert }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                                <i class="fas fa-image text-4xl"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-pink-600 font-bold px-4 py-1.5 rounded-full text-sm shadow-sm">
                            {{ $dessert->kategori }}
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-900">{{ $dessert->nama_dessert }}</h3>
                        </div>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $dessert->komposisi }}</p>
                        <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                            <span class="text-xl font-bold text-pink-600">Rp {{ number_format($dessert->harga, 0, ',', '.') }}</span>
                            <button class="bg-gray-900 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-800 transition-colors">Pesan</button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                        <i class="fas fa-ice-cream text-2xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">Belum Ada Menu</h3>
                    <p class="text-gray-500">Menu dessert sedang disiapkan. Silakan cek kembali nanti.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <a href="#" class="flex items-center gap-2 mb-4">
                    <i class="fas fa-leaf text-pink-500 text-2xl"></i>
                    <span class="font-bold text-2xl tracking-tight">Diego<span class="text-pink-500">Dessert</span></span>
                </a>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Menghadirkan kebahagiaan melalui dessert sehat, lezat, dan mendukung gaya hidup diet Anda.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Tautan</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="#home" class="hover:text-pink-500 transition-colors">Beranda</a></li>
                    <li><a href="#menu" class="hover:text-pink-500 transition-colors">Menu Diet</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-pink-500 transition-colors">Admin Login</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Hubungi Kami</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><i class="fas fa-map-marker-alt w-5"></i> Jakarta, Indonesia</li>
                    <li><i class="fas fa-envelope w-5"></i> hello@diegodessert.com</li>
                    <li><i class="fas fa-phone w-5"></i> +62 812 3456 7890</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 mt-12 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Diego Dessert. All rights reserved.
        </div>
    </footer>

</body>
</html>
