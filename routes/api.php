<?php

use App\Http\Controllers\ChildServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\ParentServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create-super-admin-account', [MainController::class, 'createSuperAdminAccount']);

Route::resource('archivists', UserController::class);
Route::get('archivists/{id}/enable-or-disable-account', [UserController::class, 'enableOrDisable']);

Route::resource('directions', DirectionController::class);

Route::resource('directions.parent-services', ParentServiceController::class)->shallow();

Route::resource('parent-services.child-services', ChildServiceController::class)->shallow();

