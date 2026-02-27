<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin KSR PMI ITN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-2 text-red-600">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-6 text-gray-600">Ini adalah panel admin untuk mengelola publikasi berita dan informasi kegiatan KSR PMI Unit ITN Malang.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <div class="bg-red-50 p-6 rounded-lg border border-red-100 shadow-sm flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-red-800">Total Berita</h4>
                                <p class="text-3xl font-black text-red-600 mt-2">0</p>
                            </div>
                            <div class="text-red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                </svg>
                            </div>
                        </div>

                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-100 shadow-sm flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-blue-800">Kategori</h4>
                                <p class="text-3xl font-black text-blue-600 mt-2">0</p>
                            </div>
                            <div class="text-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                            </div>
                        </div>

                        <div class="bg-green-50 p-6 rounded-lg border border-green-100 shadow-sm flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-green-800">Admin Aktif</h4>
                                <p class="text-3xl font-black text-green-600 mt-2">1</p>
                            </div>
                            <div class="text-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>