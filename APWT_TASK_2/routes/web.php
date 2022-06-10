<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/login',[PagesController::class, 'login'])->name('login');
Route::post('/login',[PagesController::class, 'checkuser'])->name('login');
Route::get('/registration',[PagesController::class, 'registration'])->name('registration');
Route::post('/registration',[PagesController::class, 'createAccount'])->name('registration');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::post('/contact',[PagesController::class, 'createContact'])->name('contact');