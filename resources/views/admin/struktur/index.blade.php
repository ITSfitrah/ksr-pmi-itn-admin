<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Struktur Kepengurusan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">Foto</th>
                                <th scope="col" class="px-6 py-3">NIA</th>
                                <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                                <th scope="col" class="px-6 py-3">Jabatan</th>
                                <th scope="col" class="px-6 py-3">Angkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengurus as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 flex justify-center">
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" class="h-10 w-10 object-cover rounded-full border border-gray-200">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold uppercase">
                                                {{ substr($item->nama, 0, 1) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $item->nia ?? '-' }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->nama }}</td>
                                    <td class="px-6 py-4 font-bold text-red-700">{{ $item->jabatan }}</td>
                                    <td class="px-6 py-4">{{ $item->angkatan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-base font-semibold">Belum ada data kepengurusan.</p>
                                        <p class="text-sm">Silakan tambahkan data di menu Daftar Anggota dan pilih tipe "Anggota Biasa".</p>
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