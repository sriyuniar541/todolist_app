<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// user
Route::prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'index']); 
    Route::post('/post_register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'login'])->name('login'); 
    Route::post('/post_login', [UserController::class, 'post_login']);
    Route::get('/logout', [UserController::class, 'logout']); 
});

// todo
Route::prefix('todo')->middleware('auth')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/create', [TodoController::class, 'create']);
    Route::post('/', [TodoController::class, 'store']);
    Route::get('/{id}/edit', [TodoController::class, 'edit']);
    Route::put('/{id}', [TodoController::class, 'update']);
    Route::delete('/{id}/delete', [TodoController::class, 'destroy']);
});

// todo status
Route::prefix('todoStatus')->middleware('auth')->group(function () {
    Route::get('/create', [TodoStatusController::class, 'create']);
    Route::post('/', [TodoStatusController::class, 'store']);
    // Route::get('/{id}/edit', [TodoStatusController::class, 'edit']);
    Route::put('/{id}/update', [TodoStatusController::class, 'update']);
    Route::delete('/{id}/delete', [TodoStatusController::class, 'destroy']);
});