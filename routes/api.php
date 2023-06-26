<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::post('/aluno/registrar', [App\Http\Controllers\AlunoController::class, 'store']);
Route::get('/login', [UserController::class, 'login']);

Route::group(['middleware'=>'auth:sanctum', 'prefix'=>'user'], function(){
    Route::get('', [UserController::class, 'me']);
    Route::get('', [UserController::class, 'logout']);
    Route::delete('', [UserController::class, 'delete']);
    Route::put('', [UserController::class, 'update']);
    Route::post('', [UserController::class, 'store']);    
});
