<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class QuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = database_path('warshData_v2-1.json');
        $json2 = database_path('surahs.json');

        $data = json_decode(File::get(($json)));
        $data2 = json_decode(File::get(($json2)));

        foreach ($data as $ayah) {
            \App\Models\Ayah::create([
                'ayah_id' => $ayah->id,
                'jozz' => $ayah->jozz,
                'page' => $ayah->page,
                // 'hizb' => $ayah->hizb,
                'surah_no' => $ayah->sura_no,
                'surah_name_en' => $ayah->sura_name_en,
                'surah_name_ar' => $ayah->sura_name_ar,
                'ayah_no' => $ayah->aya_no,
                'ayah_text' => $ayah->aya_text,
            ]);
        }


        echo "---- Ayahs seeded successfully ---- \n";
        echo "---- Seeding Surahs... ---- \n";

        $ayahs = \App\Models\Ayah::all();

        echo "---- Total Ayahs: {$ayahs->count()} ---- \n";

        foreach ($ayahs as $ayah) {
            if (\App\Models\Surah::where('surah_no', $ayah->surah_no)->exists()) {
                continue;
            }

            $number_of_ayahs = \App\Models\Ayah::where('surah_no', $ayah->surah_no)->count();
            $surah = \App\Models\Surah::create([
                'surah_no' => $ayah->surah_no,
                'surah_name_en' => $ayah->surah_name_en,
                'surah_name_ar' => $ayah->surah_name_ar,
                'number_of_ayahs' =>  $number_of_ayahs,
                // 'slug' => \Str::slug($data2[$ayah->surah_no - 1]->title),
                'place' => $data2[$ayah->surah_no - 1]->place == 'Mecca' ? 'Makkah' : 'Madinah',
                // 'title' => $data2[$ayah->surah_no - 1]->title,
                // 'title_ar' => $data2[$ayah->surah_no - 1]->titleAr,

            ]);
            echo "---- Seeded Surah: {$surah->surah_name_en} => {$surah->surah_no} \n";
        }
    }
}
