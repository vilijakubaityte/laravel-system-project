<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\CarsController;
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



Route::get('/', [App\Http\Controllers\HomeController::class, 'labas']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['short.code'])->group(function(){
Route::get('/owners', [OwnersController::class, 'owners'])->name("owners.list");

 Route::middleware(['auth'])->group(function (){


     Route::middleware(['admin'])->group(function (){
        Route::get('/owner/create', [OwnersController::class, 'create'])->name("owners.create");

Route::post('/owners/store', [OwnersController::class, 'store'])->name("owners.store");
Route::get('/owners/{id}/update', [OwnersController::class, 'update'])->name("owners.update");
Route::post('/owners/{id}/save', [OwnersController::class, "save"])->name("owners.save");
Route::get('/owners/{id}/destroy', [OwnersController::class, "delete"])->name("owners.delete");
Route::post('/owners/search', [OwnersController::class, 'search'])->name('owners.search');
Route::post('/owners/forget',[OwnersController::class, 'forget'])->name("owners.forget");


Route::post('/cars/search', [CarsController::class, 'search'])->name('cars.search');
Route::post('/cars/forget', [CarsController::class, 'forget'])->name('cars.forget');
Route::post('/cars/ownerName', [CarsController::class, 'ownerName'])->name('cars.ownerName');

Route::resource('cars', CarsController::class);
     });
});
});
