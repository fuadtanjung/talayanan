<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    protected $fillable = [
        'nama'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
