<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return view('pages.index');
});

Route::get('/about-us', function() {
    return view('pages.about');
});

Route::get('/contact-us', function() {
    return view('pages.contact');
});

Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
});