<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\SkillController;

use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Skill;

/*
|--------------------------------------------------------------------------
| PUBLIC PORTFOLIO ROUTES
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::view('/projects', 'pages.projects')->name('projects');

Route::view('/services', 'pages.services')->name('services');

Route::view('/skills', 'pages.skills')->name('skills');

Route::view('/experience', 'pages.experience')->name('experience');

Route::view('/certifications', 'pages.certifications')->name('certifications');

Route::view('/blog', 'pages.blog')->name('blog');

Route::view('/contact', 'pages.contact')->name('contact');

/*
|--------------------------------------------------------------------------
| PROJECT CASE STUDIES
|--------------------------------------------------------------------------
*/

Route::view('/projects/novacare', 'projects.novacare')
    ->name('projects.novacare');

Route::view('/projects/courierxpress', 'projects.courierxpress')
    ->name('projects.courierxpress');

Route::view('/projects/yellow-sail', 'projects.yellow-sail')
    ->name('projects.yellow-sail');

/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
|
| Displays live CMS statistics.
|
*/

Route::get('/dashboard', function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Statistics
    |--------------------------------------------------------------------------
    */

    $projectCount = Project::count();

    $skillCount = Skill::count();

    $blogCount = BlogPost::count();

    /*
    |--------------------------------------------------------------------------
    | Future Modules
    |--------------------------------------------------------------------------
    */

    $messageCount = 0;

    /*
    |--------------------------------------------------------------------------
    | Dashboard View
    |--------------------------------------------------------------------------
    */

    return view('dashboard', compact(

        'projectCount',

        'skillCount',

        'blogCount',

        'messageCount'

    ));

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Projects CMS
        |--------------------------------------------------------------------------
        */

        Route::resource('projects', ProjectController::class);

        /*
        |--------------------------------------------------------------------------
        | Blog CMS
        |--------------------------------------------------------------------------
        */

        Route::resource('blog-posts', BlogPostController::class);

        /*
        |--------------------------------------------------------------------------
        | Skills CMS
        |--------------------------------------------------------------------------
        */

        Route::resource('skills', SkillController::class);

    });

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';