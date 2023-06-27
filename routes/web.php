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

Route::get('/', function () {
    return view('welcome');
});

// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ランキング
Route::get('/ranking', [RankingController::class, 'index'])->name('ranking.index');

require __DIR__ . '/auth.php';


// SNSMapping
Route::get('/smap', [SnsMappingController::class, 'index']);
Route::post('/snsInput', [SnsMappingController::class, 'store']);
Route::post('/messageReply', [SnsMappingController::class, 'reply']);

//マップ
Route::get('/map', 'App\Http\Controllers\BookmarkController@map');

//旅のしおり
Route::middleware('auth')->group(function () {
    Route::get('/bookmark', 'App\Http\Controllers\BookmarkController@index');
    Route::post('/bookmark', 'App\Http\Controllers\BookmarkController@create');
    Route::delete('/bookmark', 'App\Http\Controllers\BookmarkController@delete');
});

// モデルコース
Route::get('model', function () {
    return view('model');
});
require __DIR__ . '/auth.php';
