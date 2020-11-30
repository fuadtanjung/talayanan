<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'id_media';
    public $timestamps = false;
    protected $fillable = [
        'nama_media'
    ];

    public function informasi_pengaduan(){
        return $this->hasOne(InformasiPengaduan::class);
    }
}
