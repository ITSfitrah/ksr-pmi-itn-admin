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
                    @method('PUT')

                    <div class="mb-6">
                        <label for="headline" class="block text-sm font-medium text-gray-700 mb-2">Headline / Judul
                            Berita <span class="text-red-500">*</span></label>
                        <!-- Tambahkan value old() agar data editan tidak hilang saat error -->
                        <input type="text" name="headline" id="headline"
                            value="{{ old('headline', $berita->headline) }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                            required>
                        @error('headline') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                        <!-- Menampilkan gambar aslinya, bukan cuma nama filenya -->
                        @if($berita->foto)
                            <!-- Tambahkan kata "berita/" setelah "storage/" -->
                            <img src="{{ asset('storage/berita/' . $berita->foto) }}" alt="Foto Berita"
                                class="h-40 w-auto object-cover rounded-md border border-gray-300 mb-3">
                        @else
                            <p class="text-sm text-gray-500 italic mb-3">Belum ada foto pada berita ini.</p>
                        @endif

                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Ganti Foto
                            (Opsional)</label>
                        <input type="file" name="foto" id="foto"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-red-500 focus:border-red-500"
                            accept="image/*">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maks: 2MB. Kosongkan jika tidak
                            ingin mengganti foto.</p>
                        @error('foto') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="isi_berita" class="block text-sm font-medium text-gray-700 mb-2">Isi Berita <span
                                class="text-red-500">*</span></label>
                        <!-- Tambahkan value old() di antara tag textarea -->
                        <textarea name="isi_berita" id="isi_berita" rows="6"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                            required>{{ old('isi_berita', $berita->isi_berita) }}</textarea>
                        @error('isi_berita') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('berita.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
                        <!-- Saya biarkan tombolnya warna biru sesuai kode asli Anda -->
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>