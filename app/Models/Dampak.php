<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Dampak extends Model
{
    protected $table = 'dampaks';
    protected $primaryKey = 'id_dampak';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'nama_dampak','sk_dampak'
    ];

    public function informasi_pelaporan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
