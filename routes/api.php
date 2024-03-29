<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\notesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/notes', notesController::class);
Route::post('/notes/{id}', [notesController::class, 'update']);
// Route::apiResource('/notes/update/', notesController::class, 'update');
// Route::apiResource('/notes/delete/', notesController::class, 'delete');
