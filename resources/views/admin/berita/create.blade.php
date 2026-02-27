<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita Baru KSR PMI ITN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="headline" class="block text-sm font-medium text-gray-700 mb-2">Headline / Judul Berita</label>
                        <input type="text" name="headline" id="headline" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required placeholder="Contoh: Diklat Ruang KSR PMI ITN Angkatan XXX">
                    </div>

                    <div class="mb-6">
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Upload Foto (Opsional)</label>
                        <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-md p-2 focus:ring-red-500 focus:border-red-500" accept="image/*">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maksimal 2MB.</p>
                    </div>

                    <div class="mb-6">
                        <label for="isi_berita" class="block text-sm font-medium text-gray-700 mb-2">Isi Berita</label>
                        <textarea name="isi_berita" id="isi_berita" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required placeholder="Tuliskan isi berita di sini..."></textarea>
                    </div>

                    <div class="flex justify-end">
                        <a href="/dashboard" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Berita
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>