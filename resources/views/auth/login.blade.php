<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E_Dukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6">Welcome Back 👋</h2>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 text-gray-900 dark:text-white">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 text-gray-900 dark:text-white">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" name="remember" type="checkbox"
                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-gray-600 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-400">
                    Remember me
                </label>
            </div>

            <!-- Submit & Forgot -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        Forgot your password?
                    </a>
                @endif

                <button type="submit"
                        class="ml-4 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Log in
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">Register</a>
            </p>
        </div>
    </div>

</body>
</html>
