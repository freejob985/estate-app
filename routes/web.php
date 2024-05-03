<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('properties', 'PropertyController');
Route::resource('properties', 'App\Http\Controllers\PropertyController');

Route::get('/properties/{property}/show', [App\Http\Controllers\PropertyController::class, 'showModal'])->name('properties.show.modal');



Route::get('/properties/{property}', [App\Http\Controllers\PropertyController::class, 'show'])->name('properties.show');

Route::get('/ex/export', [PropertyController::class, 'exportProperties'])->name('properties.export');
// Route::get('/properties/export', [PropertyController::class, 'exportProperties'])->name('properties.export');

