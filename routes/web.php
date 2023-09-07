<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\User_roleController;
use App\Http\Controllers\Admin\AjaxRequestController;
use App\Http\Controllers\Admin\MenuController as menu;
use App\Http\Controllers\Admin\BannerController as banner;
use App\Http\Controllers\Admin\TenderController as tender;
use App\Http\Controllers\Admin\WhatsnewsController as whatsnews;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\VideogalleryController;
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
Route::group(['middleware' => ['XSS']], function () {
        Route::get('/', function () {
        return view('welcome');
        });
});
//Route::post('login', [App\Http\Auth\LoginController::class, 'index'])->name('login');
Auth::routes();
// Route::middleware(['auth','admin','XSS','ajax.csrf'])->group(function () {

//       Route::any('/admin/get_primarylink_menu', [AjaxRequestController::class,'get_primarylink_menu'])->name('/admin/get_primarylink_menu');

// });

Route::group(['middleware' => ['auth','admin','XSS']], function () {
        Route::resource('/admin/user', UserController::class);
        Route::resource('/admin/setting', WebsiteSettingController::class);
        Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::any('/admin/store', [UserController::class, 'store'])->name('/admin/user');
        Route::any('/admin/update', [UserController::class, 'update'])->name('/admin/user');
        Route::resource('/admin/user_role', User_roleController::class);
        Route::post('/admin/user_role/{$admin_role}', [User_roleController::class, 'destroy'])->name('admin_role');
        Route::resource('/admin/menu', menu::class);
        Route::resource('/admin/banner', banner::class);
        Route::resource('/admin/tender', tender::class);
        Route::resource('/admin/whatsnews', whatsnews::class);
        Route::any('/admin/get_primarylink_menu', [AjaxRequestController::class,'get_primarylink_menu'])->name('/admin/get_primarylink_menu');
        Route::any('/admin/get_filter_menu', [AjaxRequestController::class,'get_filter_menu'])->name('/admin/get_filter_menu');
        Route::resource('/admin/faq', FaqController::class);
         Route::resource('/admin/videogallery', VideogalleryController::class);
 
       
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');