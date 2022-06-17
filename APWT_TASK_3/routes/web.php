<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;

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
    return view('pages.Login');
});
//----------------------------Admin----------------------------//
Route::get('/user/homeAdmin', [AdminController::class, 'homeAdmin'])->name('homeAdmin')->middleware('ValidAdmin');
Route::get('/admindash', [AdminController::class, 'admindash'])->name('admindash')->middleware('ValidAdmin');
Route::get('/profileAdmin', [pagesController::class, 'profileAdmin'])->name('profileAdmin')->middleware('ValidAdmin');
Route::post('/profileAdmin', [AdminController::class, 'profileEdit'])->name('profileAdminEdit');
Route::get('/list', [pagesController::class, 'list'])->name('listAdmin')->middleware('ValidAdmin');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/addUser', [pagesController::class, 'addUser'])->name('addUser');
Route::post('/addUser', [pagesController::class, 'addUserSubmit'])->name('addUser');
Route::get('/editUser/{name}', [pagesController::class, 'editUser']);
Route::post('/editUser', [pagesController::class, 'editUserSubmit'])->name('editUser');
Route::get('/deleteUser/{name}', [pagesController::class, 'deleteUser']);
Route::post('/deleteUser', [pagesController::class, 'deleteUserSubmit'])->name('deleteUser');

//----------------------------User----------------------------//
Route::get('/user/home', [UsersController::class, 'homeUser'])->name('homeUser')->middleware('ValidUser');
Route::get('/userdash', [UsersController::class, 'userdash'])->name('userdash')->middleware('ValidUser');
Route::get('/profileUser', [pagesController::class, 'profile'])->name('profileUser')->middleware('ValidUser');
Route::post('/profileEdit', [pagesController::class, 'profileEdit'])->name('profileEdit')->middleware('ValidUser');


//----------------------------Login&Registration----------------------------//
Route::get('/login', [pagesController::class, 'login']);
Route::post('/login', [pagesController::class, 'loginSubmit'])->name('login');
//Route::get('/logout', [pagesController::class, 'logout'])->name('logout');

Route::get('/registration', [pagesController::class, 'registration'])->name('registration');
Route::post('/registration', [pagesController::class, 'registrationSubmit'])->name('registration');