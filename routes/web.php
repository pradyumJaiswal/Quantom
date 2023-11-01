<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\conpanieController;
use App\http\Controllers\employeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//-------------------------Admin Controller--------------------------------------//
Route::get('/', [AdminController::class, 'index'])->name('login');
Route::POST('/login', [AdminController::class, 'login'])->name('admin_login');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

// Route::get('/Company',function(){
//     return view('companies');
// });
Route::resource('/Company',conpanieController::class);
Route::resource('/Employee',employeeController::class);
