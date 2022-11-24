<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\api\ApiController;
use App\Models\ShowFilmModel;
use App\Http\Controllers\Auth\LoginController;
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
// trang home
Route::get('/trang-chu.html', [HomeController::class,'home'])->name('film.trangchu');
Route::get('/home', [HomeController::class,'home'])->name('film.homes');
Route::get('/', [HomeController::class,'home'])->name('film.home');
Route::get('/home.html', [HomeController::class,'home'])->name('movibes');

Route::get('country/{slug?}.html', [HomeController::class,'getcountry'])->name('country');
Route::get('theloai/{slug?}/id-{id?}.html', [HomeController::class,'gettheloai'])->name('theloai');

Route::get('xem-phim-{slug?}+tap-{episode?}+id-{id?}.html', [HomeController::class,'playfilm'])->name('film.play');
Route::get('get-phim.html', [HomeController::class,'getesopide'])->name('film.get');

Route::get('thong-tin-chi-tiet/{slug?}/{id?}.html', [HomeController::class,'showdetail'])->name('film.detail');



// update film 
Route::get('update-view-film', [HomeController::class,'updateview'])->name('film.updateview');

// form
Route::get('dang-ky.html', [RegisterController::class,'index'])->name('form.regester');
Route::post('dang-ky.html', [RegisterController::class,'createUser'])->name('form.regester');


Route::post('dang-ky-check.html', [LoginController::class,'goback'])->name('form.loginregester');
Route::get('dang-nhap.html', [LoginController::class,'index'])->name('form.login');
Route::post('dang-nhap.html', [LoginController::class,'loginUser'])->name('form.login');

Route::get('dang-nhap-check.html', [LoginController::class,'checkUser'])->name('form.checkuser');
Route::post('dang-nhap-check.html', [LoginController::class,'checkUser'])->name('form.checkuser');

Route::post('dang-xuat.html', [LoginController::class,'loginOutUser'])->name('form.out');
Route::get('dang-xuat.html', [LoginController::class,'loginOutUser'])->name('form.out');

//add binh luan
Route::post('add-binh-luan.html', [HomeController::class,'handbinhluan'])->name('binhluan.add');


// show fiml
Route::get('xem-tatca-phim.html', [HomeController::class,'showall'])->name('film.all');
Route::get('xem-phim-{slug?}.html', [HomeController::class,'showfilmkind'])->name('film.kind');

//--end show fiml

// add comment report
Route::get('add-report.html', [HomeController::class,'addReport'])->name('report.add');

Route::get('handle-book-mark.html', [HomeController::class,'handboormarks'])->name('bookmark');
Route::post('handle-book-mark.html', [HomeController::class,'handboormarks'])->name('bookmark');

//send mail
Route::get('mail-regester.html', [HomeController::class,'mailRegester'])->name('mail.regester');
Route::get('get-star.html', [HomeController::class,'getStart'])->name('star.update');


Route::get('ung-ho-chung-toi/nap-the', [TopupController::class,'topup'])->name('topup.topup');

Route::get('thong-tin-ca-nhan.html', [ProfileController::class,'showprofile'])->name('profile.showprofile');
Route::get('thong-bao.html', [ProfileController::class,'shownocite'])->name('profile.notice');

Route::get('update-profile.html', [ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('update-profile.html', [ProfileController::class,'uploadavata'])->name('profile.avata');
Route::get('updatePasswork-profile.html', [ProfileController::class,'updatePasswork'])->name('profile.passwork');