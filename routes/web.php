<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyImageController;

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

// Route::post('/properties/{property}/images', [PropertyController::class, 'uploadImages'])->name('properties.images.upload');

// Route::get('/properties/{property}/images/upload', [PropertyController::class, 'showUploadImagesForm'])->name('properties.images.upload.form');

Route::post('/properties/{property}/upload-images', [PropertyController::class, 'uploadImages'])->name('properties.upload-images');
Route::get('/properties/{property}/upload-images', [PropertyController::class, 'showUploadImagesForm'])->name('properties.images.upload.form');


Route::delete('/property-images/{image}', [PropertyImageController::class, 'destroy'])->name('property-images.destroy');
Route::get('/properties/{property}/export-pdf', [PropertyController::class, 'exportPdf'])->name('properties.export.pdf');
