<?php
use App\Http\Controllers\AuthControler;
use App\Http\Controllers\UserControler;
use Illuminate\Support\Facades\Route;
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
// Route::get('/', 'AuthControler@login');

Route::get('/login', [AuthControler::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthControler::class, 'authenticate']);
Route::get('/register', [AuthControler::class, 'register'])->middleware('guest');
Route::post('/register', [AuthControler::class, 'register_store']);
Route::post('/logout', [AuthControler::class, 'logout']);

Route::get('/', [UserControler::class, 'home'])->middleware('auth');
Route::get('/user', [UserControler::class, 'home'])->middleware('auth');
Route::get('/user/hypertensi', [UserControler::class, 'hypertensi'])->middleware('auth');
Route::post('/user/hypertensi', [UserControler::class, 'hypertensi_store']);
Route::get('/user/diabetes', [UserControler::class, 'diabetes'])->middleware('auth')->name('user_diabetes');
Route::post('/user/diabetes', [UserControler::class, 'diabetes_store'])->name('user_diabetes_store');

