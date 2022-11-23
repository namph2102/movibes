<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\HandSettingsController;
use App\Http\Controllers\Auth\LoginController;

    Route::prefix('admin')->middleware('admin.checks')->group(function(){
        Route::get('/login', [AdminController::class,'loginAdmin']);
        Route::get('/dashboard.html', [AdminController::class,'AdminDashBoard'])->name("admin.dashboard");        
        Route::prefix('profile')->group(function(){
            Route::get('/', [AdminController::class,'AdminUsers']);
            Route::get('/userprofile.html', [AdminController::class,'AdminUsers'])->name("admin.users");

            
            Route::get('/addprofile.html', [AdminController::class,'addProfile'])->name("profile.add");
            Route::post('/addprofile.html', [AdminController::class,'addProfile'])->name("profile.add");

            Route::get('/changeprofile.html', [AdminController::class,'changeProfile'])->name("profile.edit");
            Route::post('/changeprofile.html', [AdminController::class,'changeProfile'])->name("profile.edit");

            Route::post('/deleteprofile.html', [AdminController::class,'deleteProfile'])->name("profile.delete");
            Route::get('/deleteprofile.html', [AdminController::class,'deleteProfile'])->name("profile.delete");

            Route::get('/findprofile.html', [AdminController::class,'findProfile'])->name("profile.find");
            Route::post('/findprofile.html', [AdminController::class,'findProfile'])->name("profile.find");
        });


        Route::prefix('film')->group(function(){
            Route::get('/', [AdminController::class,'AdminFimls'])->name('admin.films');

            Route::get('filmadd', [AdminController::class,'addfilm'])->name("film.add");// thêm phim
            Route::post('filmadd', [AdminController::class,'addfilm'])->name("film.add");

            Route::get('filmedit', [AdminController::class,'editfilm'])->name("film.edit");
            Route::post('filmedit', [AdminController::class,'editfilm'])->name("film.edit");

            Route::get('filmfind', [AdminController::class,'findfilm'])->name("film.find");
            Route::post('filmfind', [AdminController::class,'findfilm'])->name("film.find");

            Route::get('showEsopide', [AdminController::class,'listesopide'])->name("film.listesopide");
            Route::post('showEsopide', [AdminController::class,'listesopide'])->name("film.listesopide");

            Route::get('esopideAdd', [AdminController::class,'esopideAdd'])->name("esopide.add");// thêm phim
            Route::post('esopideAdd', [AdminController::class,'esopideAdd'])->name("esopide.add");

        });


        Route::prefix("topup")->group(function(){
            Route::get("showTopup",[AdminController::class,"showtopup"])->name("topup.show");
            Route::get("topUpAccount",[AdminController::class,"topUpAccount"])->name("topup.naptien");
            Route::post("topUpAccount",[AdminController::class,"topUpAccount"])->name("topup.naptien");
        });
        Route::prefix("icons")->group(function(){
            Route::get("showicons",[HandSettingsController::class,"showicons"])->name("icons.show");
            Route::post("showicons",[HandSettingsController::class,"showicons"])->name("icons.show");
            Route::get("iconsadd",[HandSettingsController::class,"iconsadd"])->name("icons.add");
        });

        Route::prefix("baoloi")->group(function(){
            Route::get("showloi",[HandSettingsController::class,"showbaoloi"])->name("baoloi.show");
            Route::post("showloi",[HandSettingsController::class,"showbaoloi"])->name("baoloi.show");
            Route::get("handloi",[HandSettingsController::class,"handloi"])->name("baoloi.handloi");
        });

        Route::prefix("catelory")->group(function(){
            Route::get("showcatelory",[HandSettingsController::class,"showcatelory"])->name("catelory.show");
            Route::post("showcatelory",[HandSettingsController::class,"showcatelory"])->name("catelory.show");
            Route::get("catelory",[HandSettingsController::class,"cateloryadd"])->name("catelory.add");

        });

        Route::prefix("country")->group(function(){
            Route::get("showcountry",[HandSettingsController::class,"showcountry"])->name("country.show");
            Route::post("showcountry",[HandSettingsController::class,"showcountry"])->name("country.show");
            Route::get("country",[HandSettingsController::class,"countryadd"])->name("country.add");
            Route::post("country",[HandSettingsController::class,"countryadd"])->name("country.add");
        });

        Route::prefix("creatsitemap")->group(function(){
            Route::get("showcreatsitemap",[HandSettingsController::class,"showcreatsitemap"])->name("creatsitemap.show");
           
            
        });

    });
    Route::get('reset-exps_rewark.html',[AdminController::class,'resetExps']);
?>