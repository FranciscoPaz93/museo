<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PendingJobController;
use App\Http\Controllers\CollectionIterationController;

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
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('collections', CollectionController::class)->names('collections');
    Route::resource('regionals', RegionalController::class)->names('regionals');
    Route::resource('collection-iterations', CollectionIterationController::class)->names('collection-iterations');
    Route::get('pending-jobs/{pendingJob}/sent-to-collection-iteration', [PendingJobController::class, 'sentToCollectionIteration'])->name('pending-jobs.sent-to-collection-iteration');
    Route::resource('roles', RoleController::class)->names('roles');
});
