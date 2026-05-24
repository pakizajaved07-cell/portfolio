<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio.about');
});

Route::get('/skills', function () {
    return view('portfolio.skills');
});

Route::get('/projects', function () {
    return view('portfolio.projects');
});

Route::get('/contact', function () {
    return view('portfolio.contact');
});

Route::post('/contact', function () {
    return back()->with('success', 'Message sent successfully!');
})->name('contact.send');