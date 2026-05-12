<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Anggota Baru') }}
            </h2>
            <a href="{{ route('anggota.index') }}" class="text-gray-500 hover:text-gray-700">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Form untuk mengirim data ke fungsi store di Controller -->
                    <!-- WAJIB ada enctype="multipart/form-data" agar bisa upload foto -->
                    <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- NIA -->
                        <div>
                            <label for="nia" class="block text-sm font-medium text-gray-700">NIA (Nomor Induk Anggota)</label>
                            <input type="text" name="nia" id="nia" value="{{ old('nia') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" placeholder="Biarkan kosong jika belum ada">
                            @error('nia') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Angkatan -->
                            <div>
                                <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan <span class="text-red-500">*</span></label>
                                <input type="text" name="angkatan" id="angkatan" value="{{ old('angkatan') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" placeholder="Contoh: 2023">
                                @error('angkatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Jabatan -->
                            <div>
                                <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan <span class="text-red-500">*</span></label>
                                <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" placeholder="Contoh: Anggota Biasa, Ketua, dll">
                                @error('jabatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- No HP -->
                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-700">No. Handphone</label>
                                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                                @error('no_hp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
                                <select name="status" id="status" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Demisioner" {{ old('status') == 'Demisioner' ? 'selected' : '' }}>Demisioner</option>
                                    <option value="Alumni" {{ old('status') == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                                </select>
                                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Foto -->
                        <div>
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto Anggota</label>
                            <input type="file" name="foto" id="foto" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 border border-gray-300 rounded-md">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, JPEG. Maksimal 2MB.</p>
                            @error('foto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="flex justify-end pt-4 border-t border-gray-200">
                            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded shadow">
                                Simpan Data
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>