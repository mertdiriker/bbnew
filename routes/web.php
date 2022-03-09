<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
        Route::get('ekle',[AdminController::class,'ekle'])->name('admin.ekle');
        Route::get('urunler',[AdminController::class,'urunler'])->name('admin.urunler');
        Route::get('firmalar',[AdminController::class,'firmalar'])->name('admin.firmalar');
        Route::get('importform',[AdminController::class,'importForm'])->name('admin.importform');
        
        


        Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
        Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
        Route::post('add-product',[AdminController::class,'addProduct'])->name('adminAddProduct');
        Route::post('add-firm',[AdminController::class,'addFirm'])->name('adminAddFirm');
        Route::post('recipe',[AdminController::class,'AddRecipe'])->name('adminAddRecipe');
        Route::post('show-recipe',[AdminController::class,'ShowRecipe'])->name('adminShowRecipe');
        Route::post('users-import',[AdminController::class,'import'])->name('adminImport');

       
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    Route::get('urunler',[UserController::class,'urunler'])->name('user.urunler');
    
});
