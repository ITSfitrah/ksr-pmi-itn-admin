<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- WAJIB tambahkan enctype="multipart/form-data" di sini -->
                <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-2">Nama Barang <span
                                class="text-red-500">*</span></label>
                        <!-- Tambahkan old() -->
                        <input type="text" name="nama_barang" id="nama_barang"
                            value="{{ old('nama_barang', $barang->nama_barang) }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                            required>
                        @error('nama_barang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $barang->jumlah) }}"
                            min="1"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                            required>
                        @error('jumlah') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kondisi" class="block text-sm font-medium text-gray-700 mb-2">Kondisi <span
                                class="text-red-500">*</span></label>
                        <select name="kondisi" id="kondisi"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                            required>
                            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik
                            </option>
                            <option value="Rusak Ringan" {{ old('kondisi', $barang->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('kondisi', $barang->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- TAMBAHAN: Tampilan Foto Lama & Input Foto Baru -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                        @if($barang->foto)
                            <!-- Pastikan pemanggilan foldernya sesuai (storage/barang) -->
                            <img src="{{ asset('storage/barang/' . $barang->foto) }}" alt="Foto {{ $barang->nama_barang }}"
                                class="h-40 w-auto object-cover rounded-md border border-gray-300 mb-3">
                        @else
                            <p class="text-sm text-gray-500 italic mb-3">Belum ada foto pada barang ini.</p>
                        @endif

                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Ganti Foto
                            (Opsional)</label>
                        <input type="file" name="foto" id="foto" accept="image/*"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-red-500 focus:border-red-500">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maksimal 2MB. Kosongkan jika tidak
                            ingin mengganti foto.</p>
                        @error('foto') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="harga_sewa" class="block text-sm font-medium text-gray-700 mb-2">Harga Sewa per Hari
                            (Rp)</label>
                        <input type="number" name="harga_sewa" id="harga_sewa"
                            value="{{ old('harga_sewa', $barang->harga_sewa) }}" min="0" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                            required>
                        <p class="text-xs text-gray-500 mt-1">Isi dengan angka saja. Biarkan 0 jika barang tidak
                            disewakan.</p>
                        @error('harga_sewa') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan
                            (Opsional)</label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">{{ old('keterangan', $barang->keterangan) }}</textarea>
                        @error('keterangan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('barang.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update
                            Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>