<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - BasKery</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover" style="background-image: url('{{'/images/bg-img.png'}}');">

 <div class="flex bg-black min-h-screen max-h-screen" style="background-color: rgba(0, 0, 0, 0.6);">
    <!-- Left Side (Background) -->
    <div class="hidden md:flex w-1/2 bg-cover bg-center items-center justify-center">
      <div class="text-white text-left pl-2 pr-0 max-w-md">
        <h1 class="text-4xl font-bold mb-5">Roti bohay semok semok</h1>
        <p class="font-extralight mb-2">Roti bohay semok semok enak lezat dan nikmat dibuat</p>
        <p class="font-extralight">dengan bahan premium dan fresh dari oven.</p>
      </div>
    </div>

    <!-- Right Side (Register Form) -->
    <div class="flex items-center justify-center w-full md:w-1/2 px-6 py-12">
      <div class="bg-white p-10 w-full max-w-md rounded-xl">
        <h3 class="font-light mb-2 leading-snug">
          LET'S GET YOU STARTED
        </h3>
        <h2 class="text-2xl font-semibold mb-6 leading-snug">
          Masuk Dengan Akun Milik Kamu
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
          @csrf

          <!-- Email -->
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600" />
          @error('email')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror

          <!-- Password -->
          <input type="password" name="password" placeholder="Password" required autocomplete="current-password"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600" />
          @error('password')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror
          
          
          <div class="flex justify-evenly">
            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600">Ingat Saya</span>
                </label>
            </div>

            <!-- Forgot Password & Login Button -->
            <div class="flex items-center justify-end">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>
          </div>
          
          <button type="submit"
              class="w-full bg-black text-white font-semibold py-3 rounded-md hover:bg-gray-800 transition">
              MULAI
          </button>
        </form>

        <div class="text-center mt-6 text-gray-500">Atau</div>

        <div class="text-center mt-2">
          <span class="text-sm text-gray-600">Belum punya akun?</span>
          <a href="{{ route('register') }}" class="text-black font-medium hover:underline">
            REGISTER DISINI
          </a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>