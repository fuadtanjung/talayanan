<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $table = 'tipes';
    protected $primaryKey = 'id_tipe';
    public $timestamps = false;
    protected $fillable = [
        'nama_tipe','sk_tipe'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
