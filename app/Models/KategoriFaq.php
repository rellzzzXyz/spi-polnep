<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriFaq extends Model
{
    protected $table = 'kategori_faq';

    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
        'urutan',
    ];

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class, 'kategori_id')->orderBy('urutan')->orderBy('id');
    }
}
