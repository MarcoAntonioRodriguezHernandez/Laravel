<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorController;
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
Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors',[AuthorController::class, 'store']);
Route::put('/authors/{authors}',[AuthorController::class, 'update']);
Route::delete('/authors/{authors}',[AuthorController::class, 'destroy']);

