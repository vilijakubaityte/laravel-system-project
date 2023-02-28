<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnersController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/owners', [OwnersController::class, 'owners'])->name("owners.list");
Route::get('/owner/create', [OwnersController::class, 'create'])->name("owners.create");
Route::post('/owners/store', [OwnersController::class, 'store'])->name("owners.store");
Route::get('/owners/{id}/update', [OwnersController::class, 'update'])->name("owners.update");
Route::post('/owners/{id}/save', [OwnersController::class, "save"])->name("owners.save");
Route::get('/owners/{id}/destroy', [OwnersController::class, "delete"])->name("owners.delete");



