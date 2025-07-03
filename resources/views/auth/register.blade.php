<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - BasKery</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover" style="background-image: url('{{'/images/bg-img.png'}}');">

 <div class="flex bg-black min-h-screen max-h-screen" style="background-color: rgba(0, 0, 0, 0.6);">
    <!-- Left Side (Background) -->
    <div class="hidden md:flex w-1/2 bg-cover bg-center items-center justify-center">
      <div class="text-white text-left px-0 max-w-md">
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
          Buat Akun Baru
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
          @csrf

          <!-- Nama -->
          <input type="text" name="name" value="{{ old('name') }}" placeholder="Your Name" required
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600" />
          @error('name')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror

          <!-- Email -->
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600" />
          @error('email')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror

          <!-- Password -->
          <input type="password" name="password" placeholder="Password" required autocomplete="new-password"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600" />
          @error('password')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror

          <!-- Confirm Password -->
          <input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600" />
          @error('password_confirmation')
              <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror

          <button type="submit"
              class="w-full bg-black text-white font-semibold py-3 rounded-md hover:bg-gray-800 transition">
              MULAI
          </button>
        </form>

        <div class="text-center mt-6 text-gray-500">Atau</div>

        <div class="text-center mt-2">
          <span class="text-sm text-gray-600">Sudah Punya Akun?</span>
          <a href="{{ route('login') }}" class="text-black font-medium hover:underline">
            LOGIN DISINI
          </a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>