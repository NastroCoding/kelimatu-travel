<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceDetailController;
use App\Models\Config;
use Illuminate\Support\Facades\Route;
use Mews\Captcha\Captcha;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('captcha/{config?}', [Captcha::class, 'create'])->name('captcha');
Route::get('/admin/mails', [MailController::class, 'index'])->name('mails.index');

Route::controller(RouteController::class)->group(function(){

    Route::get('/', 'index');
    Route::get('/about-us', 'about');
    Route::get('/contact-us', 'contact');
    Route::get('/services', 'services');
    Route::get('/activity', 'activity');
    Route::get('/activity/{slug}', 'read');

    Route::post('/mail/add', 'store_mail');

    Route::get('/login', 'login')->name('login');
    
    Route::middleware('auth')->group(function() {
        Route::get('/admin/dashboard', 'admin_inbox');
        Route::get('/admin/gallery', 'admin_gallery');
        Route::get('/admin/testimony', 'admin_testimony');
        Route::get('/admin/team', 'admin_team');
        Route::get('/admin/inbox', 'admin_inbox');
        Route::get('/admin/services', 'admin_services');
        Route::get('/admin/config', 'admin_config');
        Route::get('/admin/activity', 'admin_activity');
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

        Route::controller(ServiceController::class)->group(function(){
            Route::post('/service/post', 'store');
            Route::post('/service/update/{id}', 'update');
            Route::get('/service/delete/{id}', 'destroy');
        });

        Route::controller(ActivityController::class)->group(function(){
            Route::post('/activity/post', 'store');
            Route::post('/activity/edit/{id}', 'update');
            Route::get('/activity/delete/{id}', 'destroy');
        });

        Route::controller(MailController::class)->group(function(){
            Route::post('/mail/delete', 'destroy');
        });

        Route::controller(ServiceDetailController::class)->group(function(){
            Route::post('/service/detail/add/{id}', 'store');
        });

        Route::controller(ConfigController::class)->group(function(){
            Route::post('/config/update/{id}', 'update');
        });
    });
});

Route::fallback(function () {
    $configs = Config::latest()->first();
    return response()->view('404', [ 'configs' => $configs ], 404);
});