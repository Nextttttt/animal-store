<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'logged'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'logged')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('animal', 'AnimalCrudController');
    Route::crud('animal-species', 'AnimalSpeciesCrudController');
    Route::crud('breed', 'BreedCrudController');
    Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file
