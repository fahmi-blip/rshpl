{{-- resources/views/layouts/admin_header.blade.php --}}
<header
  x-data="{menuToggle: false}"
  class="sticky top-0 z-99999 flex w-full border-gray-200 bg-white lg:border-b dark:border-gray-800 dark:bg-gray-900"
>
  <div
    class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6"
  >
    <div
      class="flex w-full items-center justify-between gap-2 border-b border-gray-200 px-3 py-3 sm:gap-4 lg:justify-normal lg:border-b-0 lg:px-0 lg:py-4 dark:border-gray-800"
    >
      <button
        :class="sidebarToggle ? 'lg:bg-transparent dark:lg:bg-transparent bg-gray-100 dark:bg-gray-800' : ''"
        class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg border-gray-200 text-gray-500 lg:h-11 lg:w-11 lg:border dark:border-gray-800 dark:text-gray-400"
        @click.stop="sidebarToggle = !sidebarToggle"
      >
        {{-- ... (SVG icons) ... --}}
      </button>
      {{-- UBAH <a> dan <img> --}}
      <a href="{{ url('/admin/dashboard') }}" class="lg:hidden">
        <img class="dark:hidden" src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" />
        <img
          class="hidden dark:block"
          src="{{ asset('assets/images/logo/logo-dark.svg') }}"
          alt="Logo"
        />
      </a>

      {{-- ... (Form Search) ... --}}
    </div>

    <div
      :class="menuToggle ? 'flex' : 'hidden'"
      class="shadow-theme-md w-full items-center justify-between gap-4 px-5 py-4 lg:flex lg:justify-end lg:px-0 lg:shadow-none"
    >
      <div class="2xsm:gap-3 flex items-center gap-2">
        {{-- ... (Tombol Dark Mode) ... --}}
        {{-- ... (Dropdown Notifikasi) ... --}}
        {{-- PENTING: Ubah semua src="./images/user/..." menjadi {{ asset('assets/images/user/...') }} --}}
      </div>

      <div
        class="relative"
        x-data="{ dropdownOpen: false }"
        @click.outside="dropdownOpen = false"
      >
        <a
          class="flex items-center text-gray-700 dark:text-gray-400"
          href="#"
          @click.prevent="dropdownOpen = ! dropdownOpen"
        >
          <span class="mr-3 h-11 w-11 overflow-hidden rounded-full">
            {{-- UBAH <img> --}}
            <img src="{{ asset('assets/images/user/owner.jpg') }}" alt="User" />
          </span>
          <span class="text-theme-sm mr-1 block font-medium"> 
            {{-- Tampilkan nama user yang login --}}
            {{ Auth::user()->name ?? 'User' }} 
          </span>
          {{-- ... (SVG Arrow) ... --}}
        </a>

        <div
          x-show="dropdownOpen"
          class="shadow-theme-lg dark:bg-gray-dark absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-800"
        >
          {{-- ... (Isi Dropdown) ... --}}
          {{-- Ganti href="profile.html" dengan rute profil Anda --}}
          
          {{-- Tombol Sign out --}}
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
              type="submit"
              class="group text-theme-sm mt-3 flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300 w-full"
            >
              {{-- ... (SVG Sign out icon) ... --}}
              Sign out
            </button>
          </form>
        </div>
        </div>
      </div>
  </div>
</header>