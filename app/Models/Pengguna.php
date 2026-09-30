<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    protected $table = 'pengguna';

    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password_hash',
        'peran',
        'dibuat_pada',
    ];

    protected $hidden = [
        'password_hash',
    ];

    // Beritahu Laravel kolom password kustom kamu
    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}
