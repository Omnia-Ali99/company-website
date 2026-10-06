<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::name('front.')->group(function(){
    Route::view('/','front.index')->name('index');
    Route::view('/about','front.about')->name('about');
    Route::view('/service','front.service')->name('service');
    Route::view('/contact','front.contact')->name('contact');

});


Route::name('admin.')->prefix(LaravelLocalization::setLocale() .'/admin')->middleware(['localeSessionRedirect',
 'localizationRedirect', 'localeViewPath' ])->group(function(){

    Route::middleware('auth')->group(function(){

        Route::view('/','admin.index')->name('index');

        Route::controller(ServiceController::class)->group(function(){
            Route::resource('services', ServiceController::class);
        });

        
        Route::controller(FeatureController::class)->group(function(){
            Route::resource('features', FeatureController::class);
        });

            Route::controller(MessageController::class)->group(function(){
            Route::resource('messages', MessageController::class)->only(['index','show','destroy']);
        });


    });

    require __DIR__.'/auth.php';
});

