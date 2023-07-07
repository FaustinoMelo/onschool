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
Route::post('encarregado/create', [App\Http\Controllers\EncarregadoController::class, 'store']);
//Route::post('/aluno/registrar', [App\Http\Controllers\AlunoController::class, 'store']);
Route::post('/user/login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('/user/registrar', [App\Http\Controllers\UserController::class, 'store']);

Route::post('/aluno/registrar', [App\Http\Controllers\AlunoController::class, 'store']);
Route::post('/aluno/login', [App\Http\Controllers\AlunoController::class, 'login']);

Route::group(['middleware'=>'auth:sanctum'], function(){


    Route::group(['middleware'=>'auth:encarregado', 'prefix'=>'encarregado'], function () {
        Route::get('/me', [App\Http\Controllers\UserController::class, 'me']);    
        Route::get('', [UserController::class, 'logout']);
        Route::delete('', [UserController::class, 'delete']);
        Route::put('', [UserController::class, 'update']);
        Route::post('', [UserController::class, 'store']);        
    });
    
    Route::group(['middleware'=>'auth:aluno', 'prefix'=>'aluno'], function(){
        Route::get('/me', [App\Http\Controllers\AlunoController::class, 'me']);
        Route::get('logout', [UserController::class, 'logout']);
        Route::post('/create', [App\Http\Controllers\AlunoController::class, 'store']);
        Route::delete('delete', [UserController::class, 'delete']);
        Route::put('', [UserController::class, 'update']);   
    });    

    Route::group(['middleware'=>'auth:user', 'prefix'=>'professor'], function(){
        Route::post('user/create', [App\Http\Controllers\UserController::class, 'store']);
        Route::get('/me', [App\Http\Controllers\UserController::class, 'me']);
        Route::get('logout', [App\Http\Controllers\UserController::class, 'logout']);
        Route::post('/aluno/registrar', [App\Http\Controllers\UserController::class, 'store']);
        Route::delete('', [UserController::class, 'delete']); 
        Route::put('', [UserController::class, 'update']);   
    });

    Route::group(['middleware'=>'auth:user', 'prefix'=>'diretor'], function(){
        Route::post('user/create', [App\Http\Controllers\UserController::class, 'store']);
        Route::get('/me', [App\Http\Controllers\UserController::class, 'me']);
        Route::get('logout', [App\Http\Controllers\UserController::class, 'logout']);
        Route::post('/aluno/registrar', [App\Http\Controllers\UserController::class, 'store']);
        Route::delete('', [UserController::class, 'delete']);
        Route::put('', [UserController::class, 'update']);   
        
    });
    
    Route::group(['middleware'=>'auth:user', 'prefix'=>'secretario'], function(){
        Route::post('user/create', [App\Http\Controllers\UserController::class, 'store']);
        Route::get('/me', [App\Http\Controllers\UserController::class, 'me']);
        Route::get('logout', [App\Http\Controllers\UserController::class, 'logout']);
        Route::post('/aluno/registrar', [App\Http\Controllers\UserController::class, 'store']);
        Route::delete('', [UserController::class, 'delete']);
        Route::put('', [UserController::class, 'update']);   
    });
      
});