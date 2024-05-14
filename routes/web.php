<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Auth\LoginController;
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
Route::resource('users', 'App\Http\Controllers\UserController');

// Route::post('/login/app', 'Auth\LoginController@login')->name('login.app');;

Route::post('/login/app', [LoginController::class, 'login'])->name('login.app');




// Route::get('/logout/app', [LoginController::class, 'destroy'])

//                 ->name('logout.app');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.app');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/login', function () {
    if (auth()->check()) { // تحقق مما إذا كان المستخدم مسجلاً للدخول
        return redirect()->route('properties.index'); // إعادة توجيه إلى مسار properties
    } else {
        return view('auth.login'); // عرض صفحة تسجيل الدخول
    }
})->name('login');



// web.php
Route::get('/properties/import/csv', function () {
    return view('import');
})->name('properties.import.view');

Route::post('/properties/import', [PropertyController::class, 'importFromExcel'])->name('properties.import');
Route::get('/properties/export/template', [PropertyController::class, 'exportTemplate'])->name('properties.export.template');



