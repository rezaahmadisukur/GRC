<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Verifikasi Email</h1>
        <p class="text-gray-600 mt-2">Selesaikan setup akun Anda</p>
    </div>

    <!-- Info Message -->
    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <p class="text-blue-800 text-sm">
            {{ __('Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang kami kirimkan. Jika Anda tidak menerima email, kami dengan senang hati akan mengirimkan yang baru.') }}
        </p>
    </div>

    <!-- Success Message -->
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
            <p class="text-green-700 text-sm font-semibold">
                {{ __('Tautan verifikasi baru telah dikirim ke email Anda.') }}
            </p>
        </div>
    @endif

    <!-- Actions -->
    <div class="space-y-3">
        <!-- Resend Email Form -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{ __('Kirim Ulang Email Verifikasi') }}
            </button>
        </form>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</x-guest-layout>
