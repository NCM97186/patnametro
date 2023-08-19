<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User_roleController;
use App\Http\Controllers\AsklibrarianController;
use App\Http\Controllers\PlanyourvisitController;
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
//Route::post('login', [App\Http\Auth\LoginController::class, 'index'])->name('login');
Auth::routes();

Route::group(['middleware' => ['auth','admin']], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // Route::view('/admin/user', 'admin.users');
        
         Route::resource('/admin/user', UserController::class);
        Route::any('/admin/store', [UserController::class, 'store'])->name('/admin/user');
        


        Route::resource('/admin/user_role', User_roleController::class);
       Route::post('/admin/user_role/{$admin_role}', [User_roleController::class, 'destroy'])->name('admin_role');
       Route::resource('/admin/asklibrarian', AsklibrarianController::class);
        Route::resource('/admin/planyourvisit', PlanyourvisitController::class);

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
        //Route::view('/admin/planyourvisit','admin.planyourvisit');
       // Route::view('/admin/asklibrarian','admin.asklibrarian');
       
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');