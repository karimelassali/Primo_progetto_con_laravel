<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissionController;

// Get the authenticated user.
// This endpoint is protected by the auth:sanctum middleware.
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Create a mission.
// The request body must contain the mission's title, priority and publisher.
// The priority must be either 0 or 1.
// The publisher must be the name of the user who created the mission.
Route::post('/create',[MissionController::class,'create']);

// Create a mission.
// This endpoint is a duplicate of the one above.
// It is here for backwards compatibility.
Route::post('/',[MissionController::class,'create']);

// Delete a mission.
// The request body must contain the ID of the mission to be deleted.
Route::delete('/missions', [MissionController::class,'delete']);

// Update a mission.
// The request body must contain the ID of the mission to be updated.
// The request body may contain the mission's title, priority or publisher.
// The priority must be either 0 or 1.
// The publisher must be the name of the user who created the mission.
Route::patch('/missions', [MissionController::class,'update']);
