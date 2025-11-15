{{-- resources/views/layouts/admin_sidebar.blade.php --}}
<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
>
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="flex items-center gap-2 pt-8 sidebar-header pb-7"
  >
    {{-- UBAH <a> dan <img> --}}
    <a href="{{ url('/admin/dashboard') }}"> {{-- Arahkan ke rute dashboard admin Anda --}}
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        {{-- Gunakan asset() untuk memanggil gambar dari public/assets/images --}}
        <img class="dark:hidden" src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" />
        <img
          class="hidden dark:block"
          src="{{ asset('assets/images/logo/logo-dark.svg') }}"
          alt="Logo"
        />
      </span>
      <img
        class="logo-icon"
        :class="sidebarToggle ? 'lg:block' : 'hidden'"
        src="{{ asset('assets/images/logo/logo-icon.svg') }}"
        alt="Logo"
      />
    </a>
  </div>
  <div
    class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar"
  >
    <nav x-data="{selected: $persist('Dashboard')}">
      <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
          <span
            class="menu-group-title"
            :class="sidebarToggle ? 'lg:hidden' : ''"
          >
            MENU
          </span>
          {{-- ... (SVG icon) ... --}}
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
          <li>
            <a
              href="#"
              @click.prevent="selected = (selected === 'Dashboard' ? '':'Dashboard')"
              class="menu-item group"
              :class=" (selected === 'Dashboard') || (page === 'ecommerce') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              {{-- ... (SVG icon) ... --}}
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Dashboard
              </span>
              {{-- ... (SVG arrow icon) ... --}}
            </a>
            <div
              class="overflow-hidden transform translate"
              :class="(selected === 'Dashboard') ? 'block' :'hidden'"
            >
              <ul
                :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                class="flex flex-col gap-1 mt-2 menu-dropdown pl-9"
              >
                <li>
                  {{-- UBAH href --}}
                  <a
                    href="{{ url('admin/dashboard') }}" {{-- Sesuaikan dengan rute Anda --}}
                    class="menu-dropdown-item group"
                    :class="page === 'ecommerce' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                  >
                    eCommerce
                  </a>
                </li>
              </ul>
            </div>
            </li>
          
          {{-- Tambahkan menu lain di sini, ganti href="" --}}
          
          <li>
            <a
              href="#" {{-- Ganti dengan url('admin/calendar') misalny --}}
              @click="selected = (selected === 'Calendar' ? '':'Calendar')"
              class="menu-item group"
              :class=" (selected === 'Calendar') && (page === 'calendar') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              {{-- ... (SVG icon) ... --}}
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Calendar
              </span>
            </a>
          </li>
          {{-- ... (Salin sisa menu dari sidebar.html) ... --}}
          
        </ul>
      </div>
    </nav>
    </div>
</aside>