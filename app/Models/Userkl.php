<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userkl extends Model
{
    protected $table = 'userkls';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'nama_user','sk_user'
    ];


    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
