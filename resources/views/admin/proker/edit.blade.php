<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Program Kerja') }}
            </h2>
            <a href="{{ route('proker.index') }}" class="text-gray-500 hover:text-gray-700">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Perhatikan penggunaan $proker->id_program pada route -->
                    <form action="{{ route('proker.update', $proker->id_program) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nama Program -->
                        <div>
                            <label for="nama_program" class="block text-sm font-medium text-gray-700">Nama Program Kerja <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_program" id="nama_program" value="{{ old('nama_program', $proker->nama_program) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                            @error('nama_program') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi / Keterangan Singkat</label>
                            <!-- Pada textarea, value diletakkan di antara tag penutup dan pembuka -->
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('deskripsi', $proker->deskripsi) }}</textarea>
                            @error('deskripsi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tanggal Mulai -->
                            <div>
                                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai', $proker->tanggal_mulai) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                                @error('tanggal_mulai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Tanggal Selesai -->
                            <div>
                                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', $proker->tanggal_selesai) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                                @error('tanggal_selesai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status Pelaksanaan <span class="text-red-500">*</span></label>
                            <select name="status" id="status" required class="mt-1 block w-full md:w-1/2 border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                                <option value="Belum Mulai" {{ old('status', $proker->status) == 'Belum Mulai' ? 'selected' : '' }}>Belum Mulai</option>
                                <option value="Berjalan" {{ old('status', $proker->status) == 'Berjalan' ? 'selected' : '' }}>Berjalan</option>
                                <option value="Selesai" {{ old('status', $proker->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="flex justify-end pt-4 border-t border-gray-200">
                            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded shadow">
                                Update Proker
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>