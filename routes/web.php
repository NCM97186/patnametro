<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController as login;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\User_roleController;
use App\Http\Controllers\Admin\AjaxRequestController;
use App\Http\Controllers\Admin\MenuController as menu;
use App\Http\Controllers\Admin\BannerController as banner;
use App\Http\Controllers\Admin\TenderController as tender;
use App\Http\Controllers\Admin\WhatsnewsController as whatsnews;
use App\Http\Controllers\Admin\ModuleController as module;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\VideogalleryController;
use App\Http\Controllers\Themes\HomeController as themes;
use App\Http\Controllers\Themes\InnerPagesController as innerpages ;
use App\Http\Controllers\HomeController  as dashboad; 
use App\Http\Controllers\Admin\GalleryController as gallery;
use App\Http\Controllers\Lang\LangController as lang;
use App\Http\Controllers\Admin\RecruitmentController as recruitment;
use App\Http\Controllers\Admin\LogoController as logo;
use App\Http\Controllers\Admin\OfficerMessageController as officers; 
use App\Http\Controllers\Admin\NotificationsController as notifications; 
use App\Http\Controllers\Admin\TitleController as title;
use App\Http\Controllers\Admin\SocialMediaController as socialMedia;
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
       
        Route::get('/', [themes::class, 'index']);
        Route::any('pages/{slug}', [innerpages::class, 'index']);
        Route::any('officers/{slug}', [innerpages::class, 'officers']);
        Route::any('tenderivew/{slug}', [innerpages::class, 'tenderivew']);
        Route::get('lang/change', [lang::class, 'change'])->name('changeLang');
        Route::get('/admin/login', function () {return view('auth/login');  });
});

Auth::routes();
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
        Route::resource('/admin/module', module::class);
        Route::any('/admin/get_primarylink_menu', [AjaxRequestController::class,'get_primarylink_menu'])->name('/admin/get_primarylink_menu');
        Route::any('/admin/get_filter', [AjaxRequestController::class,'get_filter'])->name('/admin/get_filter');
        Route::any('/admin/get_primarylink_module', [AjaxRequestController::class,'get_primarylink_module'])->name('/admin/get_primarylink_module');
        Route::any('/admin/update_menu_orders', [AjaxRequestController::class,'update_menu_orders'])->name('/admin/update_menu_orders');
        Route::resource('/admin/faq', FaqController::class);
        Route::resource('/admin/gallery', gallery::class);
        Route::resource('/admin/videogallery', VideogalleryController::class);
        Route::resource('/admin/recruitment', recruitment::class);
        Route::resource('/admin/logo', logo::class);
        Route::resource('/admin/officers', officers::class);
        Route::resource('/admin/notifications', notifications::class);
        Route::resource('/admin/title', title::class);
        Route::resource('/admin/socialMedia', socialMedia::class);
});
Route::group(['middleware' => ['auth','XSS','modulesAccess']], function () {
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
        Route::resource('/admin/module', module::class);
        Route::any('/admin/get_primarylink_menu', [AjaxRequestController::class,'get_primarylink_menu'])->name('/admin/get_primarylink_menu');
        Route::any('/admin/get_filter', [AjaxRequestController::class,'get_filter'])->name('/admin/get_filter');
        Route::any('/admin/get_primarylink_module', [AjaxRequestController::class,'get_primarylink_module'])->name('/admin/get_primarylink_module');
        Route::any('/admin/update_menu_orders', [AjaxRequestController::class,'update_menu_orders'])->name('/admin/update_menu_orders');
        Route::resource('/admin/faq', FaqController::class);
        Route::resource('/admin/gallery', gallery::class);
        Route::resource('/admin/videogallery', VideogalleryController::class);
        Route::resource('/admin/recruitment', recruitment::class);
        Route::resource('/admin/logo', logo::class);
        Route::resource('/admin/officers', officers::class);
        Route::resource('/admin/notifications', notifications::class);
        Route::resource('/admin/title', title::class);
        Route::resource('/admin/socialMedia', socialMedia::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');