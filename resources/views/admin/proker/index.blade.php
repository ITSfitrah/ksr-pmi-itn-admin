<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Program Kerja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-4 flex justify-end">
                <a href="{{ route('proker.create') }}" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Proker
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Program</th>
                                <th scope="col" class="px-6 py-3">Deskripsi</th>
                                <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                                <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                                <th scope="col" class="px-6 py-3 text-center">Status</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prokers as $index => $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->nama_program }}</td>
                                    <td class="px-6 py-4">
                                        <!-- Memotong teks panjang agar tabel tidak berantakan -->
                                        {{ Str::limit($item->deskripsi, 50, '...') }} 
                                    </td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($item->status == 'Selesai')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">{{ $item->status }}</span>
                                        @elseif($item->status == 'Berjalan')
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">{{ $item->status }}</span>
                                        @else
                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                                        <!-- Perhatikan kita mengambil id_program, bukan id -->
                                        <a href="{{ route('proker.edit', $item->id_program) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        
                                        <form action="{{ route('proker.destroy', $item->id_program) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus proker ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-base font-semibold">Belum ada data Program Kerja.</p>
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