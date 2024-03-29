<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/info', [ThingController::class, 'info']);
Route::get('/things', [ThingController::class, 'index']); // GET request to fetch thing
Route::post('/thing', [ThingController::class, 'store']); // POST request to create an thing
Route::get('/thing/{id}', [ThingController::class, 'show']); // GET request to fetch a specific thing
Route::put('/thing/{id}', [ThingController::class, 'update']); // PUT request to update an thing
Route::delete('/thing/{id}', [ThingController::class, 'destroy']); // DELETE request to delete an thing