{{-- resources/views/layouts/admin_master.blade.php --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    {{-- Title akan dinamis berdasarkan halaman --}}
    <title>@yield('title', 'Admin Dashboard') | RSHP</title>

    {{-- 
      MEMUAT ASET STATIS DARI /public/assets/
      Kita menggunakan helper asset() untuk menunjuk ke folder public.
    --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    {{-- 
      Memuat JS. Kita letakkan di head karena template aslinya (larshp_tamplate)
      menggunakan Alpine.js yang perlu di-init di body.
      defer = agar script dieksekusi setelah HTML selesai di-parse.
    --}}
    <script src="{{ asset('assets/js/index.js') }}" defer></script>
    
    {{-- Jika Anda memindahkan library (seperti flatpickr, dropzone) ke public/assets/vendor, 
         Anda juga perlu memuat CSS-nya di sini.
         Contoh:
    <link href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    --}}

  </head>
  <body
    {{-- 
      'page' akan di-set oleh setiap halaman (view) yang me-extend layout ini.
      Ini penting untuk Alpine.js agar tahu menu mana yang aktif.
    --}}
    x-data="{ page: '@yield('page_name', 'ecommerce')', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}"
  >
    {{-- Kita akan buat file preloader terpisah --}}
    @include('layouts.admin_preloader')
    <div class="flex h-screen overflow-hidden">
      
      {{-- Ini adalah file sidebar Anda --}}
      @include('layouts.sidebar')
      <div
        class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto"
      >
        @include('layouts.admin_overlay')
        {{-- Ini adalah file header (navbar atas) Anda --}}
        @include('layouts.admin_header')
        <main>
          <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
            
            {{-- Bagian ini untuk Breadcrumb --}}
            @yield('breadcrumb')

            {{-- 
              Di sinilah konten utama dari setiap halaman akan disuntikkan.
              Ini adalah representasi dari <main> Anda.
            --}}
            @yield('content')

          </div>
        </main>
        </div>
      </div>
    </body>
</html>