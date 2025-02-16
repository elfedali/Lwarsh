<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SurahWithAyahsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'surah_no' => $this->surah_no,
            'surah_name_en' => $this->surah_name_en,
            'surah_name_ar' => $this->surah_name_ar,
            'number_of_ayahs' => $this->number_of_ayahs,
            'place' => $this->place,
            'ayahs' => AyahResource::collection($this->ayahs),
            "links" => [
                'self' => route('surahs.show', ['id' => $this->surah_no]),
                'next' => $this->surah_no < \App\Models\Surah::SURAH_COUNT ?
                    route('surahs.show', ['id' => $this->surah_no + 1]) :
                    null,
                'previous' => $this->surah_no > 1 ?
                    route('surahs.show', ['id' => $this->surah_no - 1]) :
                    null,
                // 'ayahs' => route('surahs.show', ['id' => $this->surah_no]),
            ],
        ];
    }
}
