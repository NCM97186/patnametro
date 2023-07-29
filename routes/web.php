<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/admin/user', 'admin.users');
Route::view('/admin/user_role', 'admin.user_role');
Route::view('/admin/menu', 'admin.menu');
Route::view('/admin/whatsnew', 'admin.whatsnew');
Route::view('/admin/minister', 'admin.minister');
Route::view('/admin/circular', 'admin.circular');
Route::view('/admin/exhibition', 'admin.exhibition');
Route::view('/admin/publication','admin.publication');
Route::view('/admin/tenders','admin.tenders');
Route::view('/admin/banner','admin.banner');
Route::view('/admin/feedback','admin.feedback');
Route::view('/admin/discussionforum','admin.discussionforum');
Route::view('/admin/discussiontopics','admin.discussionforum_topics');
Route::view('/admin/library_form_list','admin.library_form_list');
Route::view('/admin/online_suggestions_list','admin.online_suggestions_list');
Route::view('/admin/newedition','admin.newedition');
Route::view('/admin/manage_logo','admin.managelogo');
Route::view('/admin/latest','admin.latest');
Route::view('/admin/visitor','admin.visitor');
Route::view('/admin/photogallery','admin.photogallery');
Route::view('/admin/videogallery','admin.videogallery');
Route::view('/admin/planyourvisit','admin.planyourvisit');
Route::view('/admin/asklibrarian','admin.asklibrarian');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
