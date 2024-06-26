<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TribeController;
use App\Http\Controllers\MainClassController;
use App\Http\Controllers\SupportClassController;
use App\Http\Controllers\CharaSheetController;

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;

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

Route::get('/charasheet', function () {
    return view('charasheet');
})->middleware(['auth'])->name('charasheet');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('charasheet', CharaSheetController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('tribe', TribeController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('main_class', MainClassController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('support_class', SupportClassController::class);
});

require __DIR__.'/auth.php';
