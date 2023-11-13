<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('api/1', [ArticleController::class, 'displayAll']);
Route::get('api/2/{id}', [ArticleController::class, 'display']);
Route::post('api/3', [ArticleController::class, 'post']);
Route::delete('api/4/{id}', [ArticleController::class, 'destroy']);
