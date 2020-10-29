<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Prioritas extends Model
{
    protected $table = 'prioritas';
    protected $primaryKey = 'id_prioritas';
    public $timestamps = false;
    protected $fillable = [
        'nama_prioritas','sk_prioritas'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
