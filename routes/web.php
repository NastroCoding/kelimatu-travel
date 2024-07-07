<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(RouteController::class)->group(function(){

    Route::get('/', 'index');
    Route::get('/about-us', 'about');
    Route::get('/contact-us', 'contact');
    Route::get('/services', 'services');

    Route::get('/login', 'login')->name('login');
    
    Route::middleware('auth')->group(function() {
        Route::get('/admin/dashboard', 'admin_dashboard');
        Route::get('/admin/gallery', 'admin_gallery');
        Route::get('/admin/testimony', 'admin_testimony');
        Route::get('/admin/team', 'admin_team');
        Route::get('/admin/inbox', 'admin_inbox');
    });
    
});

Route::controller(AuthController::class)->group(function() {
    Route::post('/signin', 'signin');
});

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::controller(TeamController::class)->group(function(){
            Route::post('/team/post', 'store');
            Route::post('/team/update/{id}', 'update');
            Route::get('/team/delete/{id}', 'destroy');
        });
    
        Route::controller(GalleryController::class)->group(function(){
            Route::post('/gallery/post', 'store');
            Route::post('/gallery/update/{id}', 'update');
            Route::get('/gallery/delete/{id}', 'destroy');
        });
    
        Route::controller(TestimonialController::class)->group(function(){
            Route::post('/testimony/post', 'store');
            Route::post('/testimony/update/{id}', 'update');
            Route::get('/testimony/delete/{id}', 'destroy');
        });
    });
});