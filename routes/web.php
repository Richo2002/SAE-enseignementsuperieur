<?php

use App\Http\Controllers\DirectionController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ParentServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    Route::get('/create-super-admin-account', [MainController::class, 'createSuperAdminAccount']);
    Route::get('/filing-plan', [MainController::class, 'filingPlan']);

    Route::post('archivists/{id}/enable-or-disable-account', [UserController::class, 'enableOrDisable']);

    Route::resource('archivists', UserController::class);

    Route::resource('directions', DirectionController::class);

    Route::resource('directions.parent-services', ParentServiceController::class)->shallow();

    Route::resource('parent-services.child-services', ChildServiceController::class)->shallow();
});



require __DIR__.'/auth.php';
