<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthorsController;

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

// Public routes: no token needed


// Protected routes: the auth:api middleware rejects requests without a valid token


    
Route::apiResource('products', ProductController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorsController::class)->only(['index', 'show']);
