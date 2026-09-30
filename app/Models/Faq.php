<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    protected $table = 'faq';

    public $timestamps = false;

    protected $fillable = [
        'kategori_id',
        'pertanyaan',
        'jawaban',
        'urutan',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriFaq::class, 'kategori_id');
    }
}
