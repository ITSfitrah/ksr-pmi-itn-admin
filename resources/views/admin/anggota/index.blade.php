<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Anggota KSR PMI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Tombol Tambah Anggota -->
            <div class="mb-4 flex justify-end">
                <a href="{{ route('anggota.create') }}" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Anggota
                </a>
            </div>

            <!-- Tabel Data -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">Foto</th>
                                <th scope="col" class="px-6 py-3">NIA</th>
                                <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                                <th scope="col" class="px-6 py-3">Angkatan</th>
                                <th scope="col" class="px-6 py-3">Jabatan</th>
                                <th scope="col" class="px-6 py-3">No. HP</th>
                                <th scope="col" class="px-6 py-3 text-center">Status</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($anggota as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <!-- Foto -->
                                    <td class="px-6 py-4 flex justify-center">
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto {{ $item->nama }}" class="h-10 w-10 object-cover rounded-full border border-gray-200">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold uppercase">
                                                {{ substr($item->nama, 0, 1) }}
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <!-- Data Teks -->
                                    <td class="px-6 py-4">{{ $item->nia ?? '-' }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->nama }}</td>
                                    <td class="px-6 py-4">{{ $item->angkatan }}</td>
                                    <td class="px-6 py-4">{{ $item->jabatan }}</td>
                                    <td class="px-6 py-4">{{ $item->no_hp ?? '-' }}</td>
                                    
                                    <!-- Status -->
                                    <td class="px-6 py-4 text-center">
                                        @if(strtolower($item->status) == 'aktif')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Aktif</span>
                                        @else
                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    
                                    <!-- Aksi -->
                                    <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                                        <a href="{{ route('anggota.edit', $item->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        <a href="{{ route('anggota.destroy', $item->id) }}" class="font-medium text-red-600 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-base font-semibold">Belum ada data anggota.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>