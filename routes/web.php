<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextSimilarityController;

Route::get('/', function () {
    return view('input');
});

Route::get('/input', function () {
    return view('input');
})->name('input');

Route::post('/compare', [TextSimilarityController::class, 'compare'])->name('compare');
