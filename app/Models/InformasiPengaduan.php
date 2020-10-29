<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiPengaduan extends Model
{
    protected $table = 'informasi_pengaduans';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'no_tiket','nama_pengguna','kontak_pengguna','deskripsi','waktu_pelaporan','status','tipe_id'
    ];

    public function dampak(){
        return $this->belongsTo(Dampak::class,'dampak_id','id_dampak');
    }
    public function jenis(){
        return $this->belongsTo(Jenis::class,'jenis_id','id_jenis');
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id','id_kategori');
    }
    public function petugas(){
        return $this->belongsTo(Petugas::class,'petugas_id','id_petugas');
    }
    public function prioritas(){
        return $this->belongsTo(Prioritas::class,'prioritas_id','id_prioritas');
    }
    public function tipe(){
        return $this->belongsTo(Tipe::class,'tipe_id','id_tipe');
    }
    public function urgensi(){
        return $this->belongsTo(Urgensi::class,'urgensi_id','id_urgensi');
    }
    public function userkl(){
        return $this->belongsTo(Userkl::class,'user_id','id_user');
    }
}
