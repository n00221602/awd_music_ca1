<?php

require_once app_path('Http/Controllers/Admin/ArtistController.php');

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SongController as AdminSongController;
use App\Http\Controllers\User\SongController as UserSongController;
use App\Http\Controllers\Admin\LabelController as AdminLabelController;
use App\Http\Controllers\User\LabelController as UserLabelController;
use App\Http\Controllers\Admin\ArtistController as AdminArtistController;
use App\Http\Controllers\User\ArtistController as UserArtistController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//creates all routes for Songs.
Route::resource('/admin/songs', AdminSongController::class)->middleware(['auth'])->names('admin.songs');
Route::resource('/user/songs', UserSongController::class)->middleware(['auth'])->names('user.songs')->only(['index', 'show']);

//creates all routes for Labels.
Route::resource('/admin/labels', AdminLabelController::class)->middleware(['auth'])->names('admin.labels');
Route::resource('/user/labels', UserLabelController::class)->middleware(['auth'])->names('user.labels')->only(['index', 'show']);


//creates all routes for Artists.
Route::resource('/admin/artists', AdminArtistController::class)->middleware(['auth'])->names('admin.artists');
Route::resource('/user/artists', UserArtistController::class)->middleware(['auth'])->names('user.artists')->only(['index', 'show']);



require __DIR__.'/auth.php';
