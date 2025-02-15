<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ayah_id',
        'jozz',
        'page',
        // 'hizb',
        'surah_no',
        'surah_name_en',
        'surah_name_ar',
        'ayah_no',
        'ayah_text',
    ];

    public function surah()
    {
        return $this->belongsTo(Surah::class, 'surah_no', 'surah_no');
    }
}
