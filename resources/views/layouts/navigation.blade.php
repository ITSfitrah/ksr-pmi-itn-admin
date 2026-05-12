<nav x-data="{ open: false }" class="bg-red-700 border-b border-red-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <!--inven-->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-200 hover:text-white hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-16">
                                <div>Inventaris</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('barang.index') }}">
                                {{ __('Data Barang') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Data Obat') }}
                            </x-dropdown-link>
                        </x-slot>
                        <!--peminjaman-->
                    </x-dropdown>
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-200 hover:text-white hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-16">
                                <div>Peminjaman</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="#">
                                {{ __('Permohonan Masuk') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('On Pinjaman') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Pengembalian') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Riwayat Barang Dipinjam') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Riwayat Pengembalian Barang') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    <!--organisasi-->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-200 hover:text-white hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-16">
                                <div>Organisasi</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('berita.index') }}">
                                {{ __('Berita') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Daftar Anggota') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Struktur Kepengurusan') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Program Kerja') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <div x-data="{ openInventaris: false }">
                <button @click="openInventaris = ! openInventaris"
                    class="w-full flex justify-between items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-400 hover:text-white hover:bg-red-800 hover:border-white focus:outline-none transition duration-150 ease-in-out">
                    <span>Inventaris</span>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': openInventaris}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="openInventaris" style="display: none;" class="pl-6 bg-red-800/50">
                    <x-responsive-nav-link href="{{ route('barang.index') }}" class="text-gray-300 hover:text-white">
                        {{ __('Data Barang') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Data Obat') }}
                    </x-responsive-nav-link>
                </div>
            </div>
            <div x-data="{ openPeminjaman: false }">
                <button @click="openPeminjaman = ! openPeminjaman"
                    class="w-full flex justify-between items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-400 hover:text-white hover:bg-red-800 hover:border-white focus:outline-none transition duration-150 ease-in-out">
                    <span>Peminjaman</span>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': openPeminjaman}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="openPeminjaman" style="display: none;" class="pl-6 bg-red-800/50">
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Permohonan Masuk') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('On Pinjaman') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Pengembalian') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Riwayat Barang Dipinjam') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Riwayat Pengembalian Barang') }}
                    </x-responsive-nav-link>
                </div>
            </div>
            <!--organisasi-->
            <div x-data="{ openOrganisasi: false }">
                <button @click="openOrganisasi = ! openOrganisasi"
                    class="w-full flex justify-between items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-400 hover:text-white hover:bg-red-800 hover:border-white focus:outline-none transition duration-150 ease-in-out">
                    <span>Organisasi</span>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': openOrganisasi}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="openOrganisasi" style="display: none;" class="pl-6 bg-red-800/50">
                    <x-responsive-nav-link href="{{ route('berita.index') }}" class="text-gray-300 hover:text-white">
                        {{ __('Berita') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Daftar Anggota') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Struktur Kepengurusan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#" class="text-gray-300 hover:text-white">
                        {{ __('Program Kerja') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>