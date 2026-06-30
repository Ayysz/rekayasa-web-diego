<aside class="w-64 bg-pink-800 text-white flex flex-col shadow-lg hidden md:flex">
    <div class="h-16 flex items-center justify-center border-b border-pink-700">
        <h1 class="text-2xl font-bold">Diego Dessert</h1>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-pink-900' : 'hover:bg-pink-700' }}">
            <i class="fas fa-home mr-3 w-5 text-center"></i> Dashboard
        </a>
        <a href="{{ route('admin.desserts.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.desserts.*') ? 'bg-pink-900' : 'hover:bg-pink-700' }}">
            <i class="fas fa-ice-cream mr-3 w-5 text-center"></i> Data Master Dessert
        </a>
        <a href="{{ route('admin.transactions.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.transactions.*') ? 'bg-pink-900' : 'hover:bg-pink-700' }}">
            <i class="fas fa-shopping-cart mr-3 w-5 text-center"></i> Transaksi Pemesanan
        </a>
        <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-pink-900' : 'hover:bg-pink-700' }}">
            <i class="fas fa-users mr-3 w-5 text-center"></i> Data User
        </a>
    </nav>
    <div class="p-4 border-t border-pink-700">
        <div class="mb-4 px-4 font-semibold text-sm">{{ Auth::user()->name ?? 'Admin' }}</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-red-200 hover:bg-red-600 hover:text-white rounded-md transition-colors">
                <i class="fas fa-sign-out-alt mr-3"></i> Logout
            </button>
        </form>
    </div>
</aside>
