<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AyahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // todo : fix the links
        return [
            'id' => $this->ayah_no,
            'ayah_text' => $this->ayah_text,
            'surah_no' => $this->surah_no,
            // 'ayah_text_tashkeel' => $this->ayah_text_tashkeel,
            // 'ayah_text_uthmani' => $this->ayah_text_uthmani,
            // 'ayah_text_uthmani_tashkeel' => $this->ayah_text_uthmani_tashkeel,
            // 'juz' => $this->juz,
            // 'hizb' => $this->hizb,
            // 'rub' => $this->rub,
            // 'sajda' => $this->sajda,
            // 'page' => $this->page,
            // 'audio' => $this->audio,
            // 'translation' => $this->translation,
            'links' => [
                'self' => route('ayahs.show', ['id' => $this->ayah_id]),
                'next' =>
                $this->ayah_id < \App\Models\Ayah::AYAHS_COUNT ?
                    route('ayahs.show', ['id' => $this->ayah_id + 1]) :
                    null,
                'previous' =>
                $this->ayah_id > 1 ?
                    route('ayahs.show', ['id' => $this->ayah_id - 1]) :
                    null,
                'surah' => route('surahs.show', ['id' => $this->surah_no]),
            ],
        ];
    }
}
