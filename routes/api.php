<?php

use App\Http\Controllers\apiController\CategoryController;
use App\Http\Controllers\apiController\ProductController;
use App\Http\Controllers\apiController\TagController;
use App\Http\Controllers\apiController\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource("/categories",CategoryController::class);
Route::apiResource("/tags",TagController::class);

Route::apiResource("/products",ProductController::class);
Route::apiResource("/users",UserController::class);

