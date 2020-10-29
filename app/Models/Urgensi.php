<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Urgensi extends Model
{
    protected $table = 'urgensis';
    protected $primaryKey = 'id_urgensi';
    public $timestamps = false;
    protected $fillable = [
        'nama_urgensi','sk_urgensi'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
