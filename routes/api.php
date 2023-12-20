<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('posts',[PostController::class, 'index'])->name('Posts Api');
Route::post('posts', [PostController::class, 'store'])->name('Store Post');
Route::get('post/{id}', [PostController::class, 'show'])->name('Single Post');
Route::put('post/{id}', [PostController::class, 'update'])->name('Update Post');
Route::delete('postdelete/{id}', [PostController::class, 'destroy'])->name('Delete Post');
