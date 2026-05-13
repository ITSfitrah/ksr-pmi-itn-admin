<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4 flex justify-end">
                <a href="{{ route('berita.create') }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Berita Baru
                </a>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b-2 border-gray-200">
                                <th class="p-3 font-semibold text-gray-700 w-10 text-center">No</th>
                                <th class="p-3 font-semibold text-gray-700 w-24">Foto</th>
                                <th class="p-3 font-semibold text-gray-700 w-1/4">Headline</th>
                                <!-- Tambahan Header Isi Berita -->
                                <th class="p-3 font-semibold text-gray-700">Cuplikan Isi</th>
                                <th class="p-3 font-semibold text-gray-700 text-center w-40">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($berita as $item)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="p-3 text-center">{{ $loop->iteration }}</td>

                                    <td class="p-3">
                                        @if($item->foto)
                                            <img src="{{ asset('storage/berita/' . $item->foto) }}" alt="Foto Berita"
                                                class="w-16 h-16 object-cover rounded shadow-sm">
                                        @else
                                            <span class="text-sm text-gray-400 italic">Tanpa foto</span>
                                        @endif
                                    </td>

                                    <td class="p-3 font-medium text-gray-800">{{ $item->headline }}</td>

                                    <!-- Tambahan Data Isi Berita (Dibatasi 70 karakter) -->
                                    <td class="p-3 text-gray-600 text-sm text-justify">
                                        {{ Str::limit($item->isi_berita, 70, '...') }}
                                    </td>

                                    <td class="p-3 text-center space-x-2 whitespace-nowrap">
                                        <a href="{{ route('berita.edit', $item->id) }}"
                                            class="text-blue-600 hover:text-blue-900 font-semibold text-sm bg-blue-50 px-3 py-1.5 rounded border border-blue-200 inline-block">Edit</a>

                                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold text-sm bg-red-50 px-3 py-1.5 rounded border border-red-200 cursor-pointer">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <!-- colspan diubah jadi 5 karena sekarang ada 5 kolom -->
                                    <td class="p-6 text-center text-gray-500" colspan="5">
                                        Belum ada data berita. Silakan tambah berita baru.
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