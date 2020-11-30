<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_konfirmasi extends Model
{
    protected $table = 'status_konfirmasis';
    protected $primaryKey = 'id_konfirmasi';
    public $timestamps = false;
    protected $fillable = [
        'nama_konfirmasi'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
