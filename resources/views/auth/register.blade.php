<!DOCTYPE html>
<html lang="en" class="scroll-smooth" >
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - E_Dukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* subtle input icon container */
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #9ca3af; /* gray-400 */
        }
        /* add padding left for input with icon */
        .input-with-icon {
            padding-left: 2.75rem; /* enough for icon */
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-indigo-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen flex items-center justify-center p-4">

  <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-3xl shadow-2xl p-10">
    <h2 class="text-4xl font-extrabold text-center text-indigo-700 dark:text-indigo-400 mb-8 tracking-tight">
      Create Your Account
    </h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      {{-- Name --}}
      <div class="relative">
        <label for="name" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Full Name</label>
        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A7.963 7.963 0 0112 15a7.963 7.963 0 016.879 2.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
        </svg>
        <input
          id="name" name="name" type="text" autocomplete="name" required autofocus
          value="{{ old('name') }}"
          placeholder="John Doe"
          class="input-with-icon w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 py-3 px-4 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 transition"
        />
        @error('name')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Email --}}
      <div class="relative">
        <label for="email" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Email Address</label>
        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16 12l-4-4-4 4m0 0l4 4 4-4" />
        </svg>
        <input
          id="email" name="email" type="email" autocomplete="username" required
          value="{{ old('email') }}"
          placeholder="john@example.com"
          class="input-with-icon w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 py-3 px-4 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 transition"
        />
        @error('email')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div class="relative">
        <label for="password" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Password</label>
        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m6-6V9a6 6 0 10-12 0v2a2 2 0 002 2h8a2 2 0 002-2z" />
        </svg>
        <input
          id="password" name="password" type="password" autocomplete="new-password" required
          placeholder="At least 8 characters"
          class="input-with-icon w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 py-3 px-4 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 transition"
        />
        @error('password')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Confirm Password --}}
      <div class="relative">
        <label for="password_confirmation" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Confirm Password</label>
        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        <input
          id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
          placeholder="Confirm your password"
          class="input-with-icon w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 py-3 px-4 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 transition"
        />
        @error('password_confirmation')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center justify-between mt-6">
        <a href="{{ route('login') }}" class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
          Already registered?
        </a>
        <button
          type="submit"
          class="px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white font-semibold shadow-lg hover:brightness-110 transition"
        >
          Register
        </button>
      </div>
    </form>
  </div>

</body>
</html>
