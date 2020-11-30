<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Prioritas extends Model
{
    protected $table = 'prioritas';
    protected $primaryKey = 'id_prioritas';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'nama_prioritas','sk_prioritas'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
