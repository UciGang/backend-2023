<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

# Route students
# Method GET
Route::get('/students', [StudentController::class, 'index']);

# Method POST
Route::post('/students', [StudentController::class, 'store']);

# Method PUT
Route::put('/students/{id}', [StudentController::class, 'update']);

# Method DELETE
Route::delete('/students/{id}', [StudentController::class, 'destroy']);