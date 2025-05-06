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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\TipeRumahController; 
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ReservasiSurveyController;       

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
	// Menu Artikel
	Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.layout')->middleware('auth');
	Route::get('/artikel/add', [ArtikelController::class, 'add'])->name('artikel.add')->middleware('auth');
	Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store')->middleware('auth');
	Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit')->middleware('auth');
	Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update')->middleware('auth');
	Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy')->middleware('auth');
	Route::get('/artikel/detail/{id}', [ArtikelController::class, 'detail'])->name('artikel.detail')->middleware('auth');
	//Menu Lokasi dan Gambarnya
	Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.layout')->middleware('auth');
	Route::get('/lokasi/add', [LokasiController::class, 'add'])->name('lokasi.add')->middleware('auth');
    Route::post('/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store')->middleware('auth');
    Route::get('/lokasi/edit/{id}', [LokasiController::class, 'edit'])->name('lokasi.edit')->middleware('auth');
    Route::put('/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi.update')->middleware('auth');
    Route::delete('/lokasi/destroy/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy')->middleware('auth');
    Route::get('/lokasi/detail/{id}', [LokasiController::class, 'detail'])->name('lokasi.detail')->middleware('auth');
	//Menu Tipe Rumah dan Gambarnya
	Route::get('/tipe_rumah', [TipeRumahController::class, 'index'])->name('tipe_rumah.layout')->middleware('auth');
	Route::get('/tipe_rumah/add', [TipeRumahController::class, 'add'])->name('tipe_rumah.add')->middleware('auth');
	Route::post('/tipe_rumah/store', [TipeRumahController::class, 'store'])->name('tipe_rumah.store')->middleware('auth');
	Route::get('/tipe_rumah/edit/{id}', [TipeRumahController::class, 'edit'])->name('tipe_rumah.edit')->middleware('auth');
	Route::put('/tipe_rumah/{id}', [TipeRumahController::class, 'update'])->name('tipe_rumah.update')->middleware('auth');
	Route::delete('/tipe_rumah/destroy/{id}', [TipeRumahController::class, 'destroy'])->name('tipe_rumah.destroy')->middleware('auth');
	Route::get('/tipe_rumah/detail/{id}', [TipeRumahController::class, 'detail'])->name('tipe_rumah.detail')->middleware('auth');
	// Menu Fasilitas dan Gambarnya
	Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.layout')->middleware('auth');
	Route::get('/fasilitas/add', [FasilitasController::class, 'add'])->name('fasilitas.add')->middleware('auth');
	Route::post('/fasilitas/store', [FasilitasController::class, 'store'])->name('fasilitas.store')->middleware('auth');
	Route::get('/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->name('fasilitas.edit')->middleware('auth');
	Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update')->middleware('auth');
	Route::delete('/fasilitas/destroy/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy')->middleware('auth');
	Route::get('/fasilitas/detail/{id}', [FasilitasController::class, 'detail'])->name('fasilitas.detail')->middleware('auth');
	// Menu Reservasi-Survey dan Reservasi-Lokasi
	Route::get('/reservasi_survey', [ReservasiSurveyController::class, 'index'])->name('reservasi_survey.layout')->middleware('auth');
	Route::get('/reservasi_survey/add', [ReservasiSurveyController::class, 'add'])->name('reservasi_survey.add')->middleware('auth');
	Route::post('/reservasi_survey/store', [ReservasiSurveyController::class, 'store'])->name('reservasi_survey.store')->middleware('auth');
	Route::get('/reservasi_survey/edit/{id}', [ReservasiSurveyController::class, 'edit'])->name('reservasi_survey.edit')->middleware('auth');
	Route::put('/reservasi_survey/{id}', [ReservasiSurveyController::class, 'update'])->name('reservasi_survey.update')->middleware('auth');
	Route::delete('/reservasi_survey/destroy/{id}', [ReservasiSurveyController::class, 'destroy'])->name('reservasi_survey.destroy')->middleware('auth');
	Route::get('/reservasi_survey/detail/{id}', [ReservasiSurveyController::class, 'detail'])->name('reservasi_survey.detail')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});