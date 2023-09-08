<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\ChildServiceController;
use App\Http\Controllers\ParentServiceController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-super-admin-account', [MainController::class, 'createSuperAdminAccount']);

    Route::get('/filing-plan', [MainController::class, 'filingPlan'])->name('filing.plan');

    Route::post('archivists/{id}/enable-or-disable-account', [UserController::class, 'enableOrDisable'])->name('move.account');

    Route::resource('archives', ArchiveController::class);

    Route::post('/archives/search', [ArchiveController::class, 'search'])->name('archives.search');
    Route::post('/manage-archives/adminSearch', [ArchiveController::class, 'adminSearch'])->name('archives.searchFromAdmin');
    Route::get('/manage-archives', [ArchiveController::class, 'manageArchives'])->name('archives.mngt');
    Route::get('/downloading/{archive}', [ArchiveController::class, 'toDownload'])->name('archives.download');
    Route::get('/generate-statistiques', [ArchiveController::class, 'statistics'])->name('archives.stats');
    Route::post('/generate-statistiques/statistiques', [ArchiveController::class, 'getStatsBy'])->name('statistiques.generate');
    Route::get('/view-files/{archive}', [ArchiveController::class, 'viewFiles'])->name('files.view');
    Route::get('/view-file-pdf/{file}', [ArchiveController::class, 'viewPDF'])->name('view.pdf');

    Route::resource('archivists', UserController::class);

    Route::resource('directions', DirectionController::class);

    Route::resource('directions.parent-services', ParentServiceController::class)->shallow();

    Route::resource('parent-services.child-services', ChildServiceController::class)->shallow();


});







require __DIR__.'/auth.php';
