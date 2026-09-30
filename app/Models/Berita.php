<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    public $timestamps = false;

    protected $fillable = [
        'penulis_id',
        'kategori_id',
        'judul',
        'slug',
        'konten',
        'thumbnail_url',
        'jumlah_dilihat',
        'diterbitkan_pada',
        'dibuat_pada',
    ];

    protected function casts(): array
    {
        return [
            'diterbitkan_pada' => 'datetime',
            'dibuat_pada' => 'datetime',
        ];
    }

    public function getTanggalAttribute(): mixed
    {
        return $this->diterbitkan_pada;
    }

    public function getDeskripsiAttribute(): string
    {
        return $this->konten ?? '';
    }

    public function getGambarUrlAttribute(): ?string
    {
        return $this->thumbnail_url;
    }
}
