<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    use HasFactory;

    const SURAH_COUNT = 114;

    protected $fillable = [
        'id',
        'surah_no',
        'surah_name_en',
        'surah_name_ar',
        'number_of_ayahs',
        // 'slug',
        'place',
        // 'title',
        // 'title_ar',

    ];

    // protected $hidden = ['created_at', 'updated_at'];

    public function ayahs()
    {
        return $this->hasMany(Ayah::class, 'surah_no', 'surah_no')
            ->orderBy('ayah_no', 'asc');
    }

    public function getRouteKeyName()
    {
        return 'surah_no';
    }

    public function getAyahsCountAttribute()
    {
        return $this->ayahs->count();
    }
}
