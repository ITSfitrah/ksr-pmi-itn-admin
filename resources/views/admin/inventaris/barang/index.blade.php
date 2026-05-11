<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Inventaris Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4 flex justify-end">
                <<a href="{{ route('barang.create') }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Barang
                    </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b-2 border-gray-200">
                                <th class="p-3 font-semibold text-gray-700">No</th>
                                <th class="p-3 font-semibold text-gray-700">Nama Barang</th>
                                <th class="p-3 font-semibold text-gray-700 text-center">Jumlah</th>
                                <th class="p-3 font-semibold text-gray-700">Kondisi</th>
                                <th class="p-3 font-semibold text-gray-700">Keterangan</th>
                                <th class="p-3 font-semibold text-gray-700 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barang as $item)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="p-3">{{ $loop->iteration }}</td>
                                    <td class="p-3 font-medium">{{ $item->nama_barang }}</td>
                                    <td class="p-3 text-center">{{ $item->jumlah }}</td>
                                    <td class="p-3">{{ $item->kondisi }}</td>
                                    <td class="p-3">{{ $item->keterangan ?? '-' }}</td>
                                    
                                    <td class="p-3 text-center flex justify-center space-x-2">
                                        <a href="{{ route('barang.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 px-3 py-1 rounded border border-blue-200">Edit</a>
                                        
                                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded border border-red-200">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="p-3 text-center text-gray-500" colspan="6">Data barang belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>