<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\SnsMappingController;
use Illuminate\Contracts\View\View;
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

/* ログイン不要ページ */

//マップ
Route::get('/', [SnsMappingController::class, 'index']);
Route::get('/map', [SnsMappingController::class, 'index']);
//ランキング
Route::get('/ranking', [RankingController::class, 'index'])->name('ranking.index');
// モデルコース
Route::get('model', function () {
    return view('model');
});



/* ログイン必要ページ */

// プロフィール
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// SNSMapping
Route::middleware('auth')->group(function () {
    Route::post('/snsInput', [SnsMappingController::class, 'store']);
    Route::post('/messageReply', [SnsMappingController::class, 'reply']);
    Route::post('/pinEdit', [SnsMappingController::class, 'edit']);
});
// 旅のしおり
Route::middleware('auth')->group(function () {
    Route::get('/bookmark', 'App\Http\Controllers\BookmarkController@index');
    Route::post('/bookmark', 'App\Http\Controllers\BookmarkController@create');
    Route::delete('/bookmark', 'App\Http\Controllers\BookmarkController@delete');
});

require __DIR__ . '/auth.php';
