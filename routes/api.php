<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\api\ApiController;
use  App\Http\Controllers\api\TopupController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('binh-luan-all', [ApiController::class,'getBinhLuan'])->name('binhluan');
Route::get('get-binh-luan-user', [ApiController::class,'getUserConment'])->name('binhluan.user');
Route::get('get-bang-xep-hang-user', [ApiController::class,'getRankUser'])->name('binhluan.bxh');

Route::get('country-all', [ApiController::class,'getcountry'])->name('country');
Route::get('catelogy-all', [ApiController::class,'getcatelogy'])->name('catelogy');

// lấy tất cả danh sách phim
Route::get('get-all-film', [ApiController::class,'getListFilmAll'])->name('film.getall');


// nạp thẻ
Route::post('check_card', [TopupController::class,'checkthecao'])->name('topup.thecao');

// check banking
Route::post('check_paybank', [TopupController::class,'checkpaybank'])->name('topup.bank');

// check banking
Route::post('check_codepay', [TopupController::class,'checkpaybank'])->name('topup.bank');

Route::post('gethistorypay', [TopupController::class,'getHistory'])->name('topup.gethistory');