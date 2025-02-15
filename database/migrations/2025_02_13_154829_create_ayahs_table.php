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
        Schema::create('ayahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ayah_id')->unique()->index();
            $table->unsignedInteger('jozz');
            $table->unsignedInteger('page');
            // $table->unsignedInteger('hizb')->nullable();
            $table->unsignedInteger('surah_no');
            $table->string('surah_name_en');
            $table->string('surah_name_ar');
            $table->unsignedInteger('ayah_no');
            $table->text('ayah_text')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayahs');
    }
};
