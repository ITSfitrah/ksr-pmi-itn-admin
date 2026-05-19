<x-guest-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('permohonan.store') }}" method="POST" id="formPermohonan">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-500 text-sm mb-1">Nama Pemohon</label>
                        <input type="text" name="nama_pemohon" class="w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-500 text-sm mb-1">Nomor Telepon</label>
                        <input type="text" name="no_telp" class="w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-500 text-sm mb-1">Alamat</label>
                        <textarea name="alamat_detail" rows="2" class="w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-500 text-sm mb-1">Hari Pengambilan</label>
                        <input type="date" name="tgl_rencana_pengambilan" class="w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-gray-600" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-500 text-sm mb-1">Pilih Barang</label>
                        <div class="flex flex-col md:flex-row gap-0 rounded border border-gray-300 overflow-hidden">
                            
                            <select id="pilih_barang" class="flex-grow border-0 focus:ring-0 text-gray-600">
                                <option value="">-- Pilih Barang --</option>
                                @foreach($barang as $item)
                                    <option value="{{ $item->id }}" data-nama="{{ $item->nama_barang }}" data-harga="{{ $item->harga_sewa }}">
                                        {{ $item->nama_barang }} (Rp {{ number_format($item->harga_sewa, 0, ',', '.') }}/hari)
                                    </option>
                                @endforeach
                            </select>
                            
                            <input type="number" id="input_jumlah" placeholder="Jumlah" min="1" class="w-full md:w-32 border-0 border-l border-gray-300 focus:ring-0 text-gray-600">
                            
                            <input type="number" id="input_durasi" placeholder="Durasi (hari)" min="1" class="w-full md:w-32 border-0 border-l border-gray-300 focus:ring-0 text-gray-600">
                            
                            <button type="button" id="btn_tambah" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 flex items-center justify-center font-medium transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                </svg>
                                Tambah
                            </button>
                        </div>
                    </div>

                    <h3 class="text-xl text-gray-500 mb-2">Daftar Barang yang Dipinjam</h3>
                    <div class="border border-gray-200 rounded overflow-hidden mb-6">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-white border-b border-gray-200 text-gray-500 font-semibold text-sm">
                                    <th class="p-3 border-r border-gray-200">Nama Barang</th>
                                    <th class="p-3 border-r border-gray-200 w-24">Jumlah</th>
                                    <th class="p-3 border-r border-gray-200 w-40">Harga Jasa</th>
                                    <th class="p-3 border-r border-gray-200 w-24">Durasi</th>
                                    <th class="p-3 w-20 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_keranjang" class="bg-white">
                                <tr id="row_kosong">
                                    <td colspan="5" class="p-4 text-center text-gray-400 text-sm">Belum ada barang yang dipilih.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded text-lg transition">
                        Ajukan Permohonan
                    </button>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnTambah = document.getElementById('btn_tambah');
            const selectBarang = document.getElementById('pilih_barang');
            const inputJumlah = document.getElementById('input_jumlah');
            const inputDurasi = document.getElementById('input_durasi');
            const tabelKeranjang = document.getElementById('tabel_keranjang');
            const rowKosong = document.getElementById('row_kosong');
            
            let idCounter = 0; // Untuk memberikan ID unik pada setiap baris

            btnTambah.addEventListener('click', function() {
                // Ambil nilai dari input
                const barangId = selectBarang.value;
                const barangNama = selectBarang.options[selectBarang.selectedIndex].getAttribute('data-nama');
                const hargaSatuan = parseInt(selectBarang.options[selectBarang.selectedIndex].getAttribute('data-harga')) || 0;
                const jumlah = parseInt(inputJumlah.value);
                const durasi = parseInt(inputDurasi.value);

                // Validasi: Pastikan semua diisi
                if(!barangId || !jumlah || !durasi) {
                    alert('Mohon lengkapi pilihan barang, jumlah, dan durasi!');
                    return;
                }

                // Sembunyikan tulisan "Belum ada barang..."
                if(rowKosong) rowKosong.style.display = 'none';

                // Hitung total harga jasa (Harga x Jumlah x Durasi)
                const totalHarga = hargaSatuan * jumlah * durasi;
                
                // Format rupiah
                const formatRupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(totalHarga);

                idCounter++;

                // Buat elemen baris <tr> baru
                const tr = document.createElement('tr');
                tr.className = "border-b border-gray-100 text-gray-700 text-sm";
                tr.id = "row_" + idCounter;

                // Masukkan HTML ke dalam baris beserta INPUT HIDDEN ARRAY (name="barang_id[]") untuk dikirim ke backend
                tr.innerHTML = `
                    <td class="p-3 border-r border-gray-200">
                        ${barangNama}
                        <input type="hidden" name="barang_id[]" value="${barangId}">
                    </td>
                    <td class="p-3 border-r border-gray-200">
                        ${jumlah}
                        <input type="hidden" name="jumlah[]" value="${jumlah}">
                    </td>
                    <td class="p-3 border-r border-gray-200">
                        ${formatRupiah}
                        <input type="hidden" name="harga_jasa[]" value="${totalHarga}">
                    </td>
                    <td class="p-3 border-r border-gray-200">
                        ${durasi} hari
                        <input type="hidden" name="durasi[]" value="${durasi}">
                    </td>
                    <td class="p-3 text-center">
                        <button type="button" class="text-red-500 hover:text-red-700 font-medium" onclick="hapusBaris('row_${idCounter}')">Hapus</button>
                    </td>
                `;

                // Tambahkan baris ke dalam tabel
                tabelKeranjang.appendChild(tr);

                // Reset inputan atas setelah ditambahkan
                selectBarang.value = "";
                inputJumlah.value = "";
                inputDurasi.value = "";
            });
        });

        // Fungsi untuk menghapus baris dari tabel
        function hapusBaris(rowId) {
            document.getElementById(rowId).remove();
            
            // Tampilkan kembali tulisan "Belum ada barang..." jika tabel kosong
            const tbody = document.getElementById('tabel_keranjang');
            if(tbody.children.length === 1) { // 1 karena masih ada TR row_kosong yang disembunyikan
                document.getElementById('row_kosong').style.display = '';
            }
        }
    </script>
</x-guest-layout>