<?php

use App\Http\Controllers\Przychodnia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', Przychodnia::class);

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/search',[UserController::class,'search'])->name('users.search');

Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');
Route::get('/visits/create', [VisitController::class, 'create'])->name('visits.create');
Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');
Route::get('/visits/{visit}/edit', [VisitController::class, 'edit'])->name('visits.edit');
Route::put('/visits/{visit}', [VisitController::class, 'update'])->name('visits.update');
Route::delete('/visits/{visit}', [VisitController::class, 'destroy'])->name('visits.destroy');
Route::post('/visits/search',[VisitController::class,'search'])->name('visits.search');

