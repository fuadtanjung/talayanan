<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $table = 'tipes';
    protected $primaryKey = 'id_tipe';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'nama_tipe','id_tipe'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
