<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# bungkus dengan sanctum
Route::middleware('auth:sanctum')->group(function () {
    # ambil semua data
    Route::get('/news', [NewsController::class, 'index']);

    # menambahkan data
    Route::post('/news', [NewsController::class, 'store']);

    # deskripsikan data
    Route::get('/news/{id}', [NewsController::class, 'show']);

    # edit data
    Route::put('/news/{id}', [NewsController::class, 'update']);

    # hapus data
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);

    # cari by title
    Route::get('/news/search/{title}', [NewsController::class, 'search']);

    # show kategori sport
    Route::get('/news/category/sport', [NewsController::class, 'sport']);

    # show kategori finance
    Route::get('/news/category/finance', [NewsController::class, 'finance']);

    # show kategori automotive
    Route::get('/news/category/automotive', [NewsController::class, 'automotive']);
});

# rute regis dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);