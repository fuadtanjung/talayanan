<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class InformasiPengaduan extends Model
{
    use AutoNumberTrait;

    protected $table = 'informasi_pengaduans';
    protected $primaryKey = 'no_tiket';
    public $keyType = 'string';
    protected $fillable = [
        'nama_pengguna','kontak_pengguna','deskripsi','waktu_pelaporan','status','tipe_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_pengaduan','id');
    }
    public function dampak(){
        return $this->belongsTo(Dampak::class,'dampak_id','id_dampak');
    }
    public function jenis(){
        return $this->belongsTo(Jenis::class,'jenis_id','id_jenis');
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id','id_kategori');
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
    public function status(){
        return $this->belongsTo(Status::class,'status_id','id_status');
    }
    public function media(){
        return $this->belongsTo(Media::class,'media_id','id_media');
    }
    public function konfirmasi(){
        return $this->belongsTo(Status_konfirmasi::class,'konfirmasi_id','id_konfirmasi');
    }

    public function detail_petugas(){
        return $this->hasOne(Detail_petugas::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'no_tiket' => [
                'format' => date('Y').'-?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
