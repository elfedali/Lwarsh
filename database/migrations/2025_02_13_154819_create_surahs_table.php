<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surahs', function (Blueprint $table) {
            $table->id();
            $table->integer('surah_no')->unique();
            $table->string('surah_name_en');
            $table->string('surah_name_ar');
            $table->integer('number_of_ayahs');
            // slug
            // $table->string('slug')->unique();
            // place
            $table->string('place')->enum('Makkah', 'Madinah');
            //type
            //$table->string('type')->enum('Meccan', 'Medinan');
            // title eng no tashkeel
            // $table->string('title');
            //titleArabic no tashkeel
            // $table->string('title_ar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surahs');
    }
};
