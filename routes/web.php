<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\Project;


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
| Purpose:
| Displays the KaroDev Admin Dashboard with
| live statistics retrieved from the database.
|
| Statistics Currently Displayed:
| • Total Projects
| • Total Skills
| • Total Blog Posts
| • Total Contact Messages
|
| Future Statistics:
| • Featured Projects
| • Total Certifications
| • Total Experience Records
| • Recent Messages
| • Recent Blog Posts
|
*/

Route::get('/dashboard', function () {

    /*
|--------------------------------------------------------------------------
| Retrieve Dashboard Statistics
|--------------------------------------------------------------------------
|
| At this stage of development, only the Projects
| module has been completed.
|
| The remaining modules will be connected later
| as they are built.
|
*/

            $projectCount = Project::count();

/*
|--------------------------------------------------------------------------
| Temporary Placeholder Values
|--------------------------------------------------------------------------
|
| These values will become dynamic once the
| corresponding CMS modules are completed.
|
*/

           $skillCount = 0;

           $blogCount = 0;

           $messageCount = 0;



    /*
    |--------------------------------------------------------------------------
    | Send Statistics to Dashboard View
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

        Route::resource('projects', ProjectController::class);

    });

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
