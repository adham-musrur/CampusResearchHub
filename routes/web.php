<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResearchPaperController;
use App\Http\Controllers\ResearchProjectController;
use App\Http\Controllers\ResearchUpdateController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| IMPORTANT:
| Only authenticated administrators can access these routes.
|
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('users', UserController::class)
            ->except(['show']);

    });


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Research Projects
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'projects',
        ResearchProjectController::class
    );


    /*
    |--------------------------------------------------------------------------
    | Research Papers
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'papers',
        ResearchPaperController::class
    )->only([
        'index',
        'create',
        'store',
        'show',
        'destroy'
    ]);


    Route::get(
        '/papers/{paper}/download',
        [ResearchPaperController::class, 'download']
    )->name('papers.download');


    /*
    |--------------------------------------------------------------------------
    | Datasets
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'datasets',
        DatasetController::class
    )->only([
        'index',
        'create',
        'store',
        'show',
        'destroy'
    ]);


    Route::get(
        '/datasets/{dataset}/download',
        [DatasetController::class, 'download']
    )->name('datasets.download');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');


    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | Research Updates
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'updates',
        ResearchUpdateController::class
    )->only([
        'index',
        'create',
        'store',
        'show',
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | Project Discussions
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/projects/{project}/discussions',
        [DiscussionController::class, 'index']
    )->name('projects.discussions');


    Route::post(
        '/projects/{project}/discussions',
        [DiscussionController::class, 'store']
    )->name('projects.discussions.store');


    Route::delete(
        '/discussions/{discussion}',
        [DiscussionController::class, 'destroy']
    )->name('discussions.destroy');

});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';