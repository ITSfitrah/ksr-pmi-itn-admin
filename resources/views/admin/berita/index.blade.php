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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b-2 border-gray-200">
                                <th class="p-3 font-semibold text-gray-700">No</th>
                                <th class="p-3 font-semibold text-gray-700">Foto</th>
                                <th class="p-3 font-semibold text-gray-700">Headline</th>
                                <th class="p-3 font-semibold text-gray-700 text-center">Aksi</th>
                            </tr>
                        </thead>
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                                role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        <tbody>
                            @forelse ($berita as $item)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="p-3 text-center">{{ $loop->iteration }}</td>

                                    <td class="p-3">
                                        @if($item->foto)
                                            <img src="{{ asset('storage/berita/' . $item->foto) }}" alt="Foto Berita"
                                                class="w-20 h-20 object-cover rounded shadow-sm">
                                        @else
                                            <span class="text-sm text-gray-400 italic">Tanpa foto</span>
                                        @endif
                                    </td>

                                    <td class="p-3 font-medium text-gray-800">{{ $item->headline }}</td>

                                    <td class="p-3 text-center space-x-2">
                                        <a href="{{ route('berita.edit', $item->id) }}"
                                            class="text-blue-600 hover:text-blue-900 font-semibold text-sm bg-blue-50 px-3 py-1 rounded border border-blue-200">Edit</a>

                                        <span class="text-red-400 italic text-sm">(Hapus menyusul)</span>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="p-3 text-center text-gray-500" colspan="4">Belum ada data berita. Silakan
                                        tambah berita baru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>