<?php

use App\Http\Resources\SurahCollection;
use App\Http\Resources\SurahResource;
use App\Http\Resources\SurahWithAyahsResource;
use App\Models\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/surahs', function () {
    $surahs = \App\Models\Surah::all()->sortBy('surah_no');
    return new SurahCollection($surahs);
});

Route::get('/ayahs/{id}', function ($id) {
    $ayah = \App\Models\Ayah::find($id);
    return new \App\Http\Resources\AyahResource($ayah);
})->name('ayahs.show');


Route::get('/surahs/{id}', function (Request $request, $id) {

    $surah = \App\Models\Surah::find($id)->load('ayahs');
    return new SurahWithAyahsResource($surah);
})->name('surahs.show');

// Route::get('/surahs/{id}/ayahs', function ($id) {
//     $ayahs = \App\Models\Ayah::where('surah_id', $id)->get();
//     return response()->json($ayahs);
// });

Route::get('/surahs/{id}/ayahs/{ayah}', function ($id, $ayah) {
    $ayah = \App\Models\Ayah::where('surah_no', $id)->where('ayah_no', $ayah)->first();
    return response()->json($ayah);
});
