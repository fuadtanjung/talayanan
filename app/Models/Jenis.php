<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'nama_jenis','sk_jenis'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
