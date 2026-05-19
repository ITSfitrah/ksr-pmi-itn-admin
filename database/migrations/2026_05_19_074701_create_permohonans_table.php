<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id('id_permohonan'); 
            
            $table->string('nama_pemohon');
            $table->string('no_telp');
            $table->text('alamat_detail');
            $table->string('instansi')->nullable();
            $table->integer('durasi_peminjaman'); 
            $table->date('tgl_rencana_pengambilan'); 
            $table->string('status')->default('Menunggu'); // Saran tambahan untuk status
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan');
    }
};
