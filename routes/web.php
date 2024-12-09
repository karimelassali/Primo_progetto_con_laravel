<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissionController;

// Home page.
// This route is protected by the auth middleware and will only be accessible to the
// authenticated user.
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

// Authenticated routes.
// These routes are protected by the auth:sanctum middleware and will only be accessible
// to the authenticated user.
// The Jetstream auth session middleware is used to ensure that the user is authenticated
// for the entire session.
// The verified middleware is used to ensure that the user's email address has been
// verified.
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard page.
    // This route is accessible only to the authenticated user.
    // It will display the welcome view.
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});

// Logout route.
// This route is accessible only to the authenticated user.
// It will call the logout method on the MissionController class.
Route::get('/logout',[MissionController::class,'logout']);


// Show mission route.
// This route is protected by the auth middleware and will only be accessible to the
// authenticated user.
// It will call the fetch method on the MissionController class.
Route::get('/show',[MissionController::class,'fetch'])->middleware('auth');
