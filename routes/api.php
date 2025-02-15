<?php

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
    return response()->json($surahs);
});

Route::get('/ayahs', function () {
    $ayahs = \App\Models\Ayah::all();
    return response()->json($ayahs);
});


Route::get('/surahs/{id}', function ($id) {
    $surah = \App\Models\Surah::find($id)->load('ayahs');
    return response()->json($surah);
});

// Route::get('/surahs/{id}/ayahs', function ($id) {
//     $ayahs = \App\Models\Ayah::where('surah_id', $id)->get();
//     return response()->json($ayahs);
// });

Route::get('/surahs/{id}/ayahs/{ayah}', function ($id, $ayah) {
    $ayah = \App\Models\Ayah::where('surah_no', $id)->where('ayah_no', $ayah)->first();
    return response()->json($ayah);
});
