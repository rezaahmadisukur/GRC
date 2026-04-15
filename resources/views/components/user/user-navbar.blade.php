<nav class="bg-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <div class="flex-shrink-0 flex items-center text-xl font-bold text-gray-800">
          🚗 GRC Rental
        </div>
      </div>

      <!-- Navigation Links -->
      <div class="hidden md:ml-6 md:flex md:space-x-8">
        <a href="#home"
          class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
          Beranda
        </a>
        <a href="#cars"
          class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
          Mobil
        </a>
        <a href="#about"
          class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
          Tentang
        </a>
        <a href="#contact"
          class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
          Kontak
        </a>
      </div>

      <!-- Auth Buttons -->
      <div class="flex items-center space-x-4">
        @auth
          <a href="{{ url('/dashboard') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
            Dashboard
          </a>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit"
              class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
              Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}"
            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
            Login
          </a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}"
              class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
              Register
            </a>
          @endif
        @endauth
      </div>
    </div>
  </div>
</nav>