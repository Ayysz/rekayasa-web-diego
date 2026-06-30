<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Diego Dessert</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg px-8 py-8 mb-4">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
                <p class="text-sm text-gray-500">Diego Dessert Admin Panel</p>
            </div>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-pink-500" id="email" type="email" name="email" placeholder="admin@diegodessert.com" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline focus:border-pink-500" id="password" type="password" name="password" placeholder="******************" required>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-300" type="submit">
                        Sign In
                    </button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ url('/') }}" class="text-sm text-pink-600 hover:text-pink-800">Kembali ke Beranda</a>
                <br>
                <small class="text-sm text-gray-300 hover:text-gray-400">admin@diegodessert.com / password123</small>
            </div>
        </div>
    </div>
</body>
</html>
