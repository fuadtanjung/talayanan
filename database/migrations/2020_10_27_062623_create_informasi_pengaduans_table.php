<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiPengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_pengaduans', function (Blueprint $table) {
            $table->string('no_tiket');
            $table->unsignedBigInteger('user_id');
            $table->string('dampak_id')->nullable();
            $table->string('jenis_id')->nullable();
            $table->string('urgensi_id')->nullable();
            $table->string('prioritas_id')->nullable();
            $table->string('tipe_id')->nullable();
            $table->string('kategori_id')->nullable();
            $table->unsignedBigInteger('konfirmasi_id')->nullable();
            $table->unsignedBigInteger('media_id')->nullable();
            $table->date('waktu_pelaporan');
            $table->string('deskripsi');
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tgl_pemuktahiran')->nullable();
            $table->string('solusi')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('status_pengguna')->nullable();
            $table->timestamps();

            $table->primary('no_tiket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_pengaduans');
    }
}
