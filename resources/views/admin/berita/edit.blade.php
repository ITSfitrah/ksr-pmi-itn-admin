<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita KSR PMI ITN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <div class="mb-6">
                        <label for="headline" class="block text-sm font-medium text-gray-700 mb-2">Headline / Judul Berita</label>
                        <input type="text" name="headline" id="headline" value="{{ $berita->headline }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required>
                    </div>

                    <div class="mb-6">
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                        @if($berita->foto)
                            <p class="text-sm text-gray-500 mb-2">Foto saat ini: {{ $berita->foto }}</p>
                        @endif
                        <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-md p-2 focus:ring-red-500 focus:border-red-500" accept="image/*">
                        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti foto.</p>
                    </div>

                    <div class="mb-6">
                        <label for="isi_berita" class="block text-sm font-medium text-gray-700 mb-2">Isi Berita</label>
                        <textarea name="isi_berita" id="isi_berita" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required>{{ $berita->isi_berita }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('berita.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>