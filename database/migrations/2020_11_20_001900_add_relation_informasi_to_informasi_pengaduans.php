<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationInformasiToInformasiPengaduans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informasi_pengaduans', function (Blueprint $table) {
            $table->foreign('dampak_id')->references('id_dampak')->on('dampaks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('konfirmasi_id')->references('id_konfirmasi')->on('status_konfirmasis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_id')->references('id_jenis')->on('jenis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('urgensi_id')->references('id_urgensi')->on('urgensis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('prioritas_id')->references('id_prioritas')->on('prioritas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipe_id')->references('id_tipe')->on('tipes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kategori_id')->references('id_kategori')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('media_id')->references('id_media')->on('media')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informasi_pengaduans', function (Blueprint $table) {
            //
        });
    }
}
