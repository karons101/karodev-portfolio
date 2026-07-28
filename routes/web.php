<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::view('/projects', 'pages.projects')->name('projects');

Route::view('/services', 'pages.services')->name('services');

Route::view('/skills', 'pages.skills')->name('skills');

Route::view('/experience', 'pages.experience')->name('experience');

Route::view('/certifications', 'pages.certifications')->name('certifications');

Route::view('/blog', 'pages.blog')->name('blog');

Route::view('/contact', 'pages.contact')->name('contact');

Route::view('/projects/novacare', 'projects.novacare')
    ->name('projects.novacare');

Route::view('/projects/courierxpress', 'projects.courierxpress')
    ->name('projects.courierxpress');

Route::view('/projects/yellow-sail', 'projects.yellow-sail')
    ->name('projects.yellow-sail');