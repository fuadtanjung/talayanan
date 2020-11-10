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
            $table->bigIncrements('id_pengaduan');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('dampak_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('jenis_id')->nullable();
            $table->unsignedBigInteger('urgensi_id')->nullable();
            $table->unsignedBigInteger('prioritas_id')->nullable();
            $table->unsignedBigInteger('tipe_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->string('no_tiket')->nullable();
            $table->string('nama_pengguna');
            $table->string('kontak_pengguna');
            $table->string('media_pelaporan')->nullable();
            $table->date('waktu_pelaporan');
            $table->string('deskripsi');
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tgl_pemuktahiran')->nullable();
            $table->string('solusi')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('status_pengguna')->nullable();
            $table->timestamps();

            $table->foreign('dampak_id')->references('id_dampak')->on('dampaks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id_user')->on('userkls')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_id')->references('id_jenis')->on('jenis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('urgensi_id')->references('id_urgensi')->on('urgensis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('prioritas_id')->references('id_prioritas')->on('prioritas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipe_id')->references('id_tipe')->on('tipes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kategori_id')->references('id_kategori')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('petugas_id')->references('id_petugas')->on('petugas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
