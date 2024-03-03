<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Page
    // Route::get('/home', function () {
    //     return view('frontend.home-page');
    // });
    Route::get('/post', function () {
        return view('frontend.post-page');
    })->name('post.photo');

    // photo CRUD
    Route::post('/posting', [PhotoController::class, 'store'])->name('photo.store');
    Route::get('/home', [PhotoController::class, 'index'])->name('photo.index');
    Route::get('/my-photo', [PhotoController::class, 'index2'])->name('photo.index2');
    Route::get('/photo/{id_photo}', [PhotoController::class, 'detail'])->name('photo.detail');
    Route::get('/edit-photo/{id_photo}', [PhotoController::class, 'edit'])->name('photo.edit');
    Route::patch('/update-photo/{id_photo}', [PhotoController::class, 'update'])->name('photo.update');
    Route::get('/delete-photo/{id_photo}/delete', [PhotoController::class, 'destroy'])->name('photo.delete');

    //comment
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

});

require __DIR__.'/auth.php';
