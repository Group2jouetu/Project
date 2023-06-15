<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('map', function () {
    return view('map');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ランキング
Route::get('/ranking', [RankingController::class, 'index']);

//マップ
Route::get('/map', 'App\Http\Controllers\BookmarkController@index');
Route::post('/map','App\Http\Controllers\BookmarkController@create');

//削除処理と登録処理の併用処理の実装途中
Route::delete('/map','App\Http\Controllers\BookmarkController@delete');

// モデルコース
Route::get('model', function () {
    return view('model');
});
require __DIR__.'/auth.php';
