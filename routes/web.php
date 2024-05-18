<?php

use App\Http\Controllers\AttendanceSystemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventIndexController;
use App\Http\Controllers\EventShowController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryIndexController;
use App\Http\Controllers\LikedEventController;
use App\Http\Controllers\LikeSystemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedEventController;
use App\Http\Controllers\SaveSystemController;
use App\Http\Controllers\WelcomeController;
use App\Models\University;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, '__invoke'])->name('welcome');
Route::get('/e', EventIndexController::class)->name('eventIndex');
Route::get('/e/{id}', EventShowController::class)->name('eventShow');
Route::get('/gallery', GalleryIndexController::class)->name('galleryIndex');

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //custom routes
    Route::resource('/events', EventController::class);
    Route::resource('/galleries', GalleryController::class);
    Route::get('/saved-events', SavedEventController::class)->name('savedEvents');



    Route::post('/events-saved/{id}', [SaveSystemController::class, '__invoke']);


    Route::get('/universities/{university}', function (University $university) {
        return response()->json($university->venues);
    });
});

require __DIR__ . '/auth.php';
