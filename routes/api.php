<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\EntityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//LOGIN
Route::post("login", [UserController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    //LOGOUT
    Route::delete("logout", [UserController::class, 'logout']);

    //USER
    Route::group(['prefix' => 'users'], function () {
        Route::get('/index',  [UserController::class, 'index']);
        Route::get('/show/{id}', [UserController::class, 'show']);
        Route::post('/store', [UserController::class, 'store']);
        Route::put('/update/{id}', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'delete']);
    });

    //CATEGORY
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/index',  [CategoryController::class, 'index']);
        Route::get('/show/{id}', [CategoryController::class, 'show']);
        Route::post('/store', [CategoryController::class, 'store']);
        Route::put('/update/{id}', [CategoryController::class, 'update']);
        Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
    });

    //JOB
    Route::group(['prefix' => 'jobs'], function () {
        Route::get('/index',  [JobController::class, 'index']);
        Route::get('/show/{id}', [JobController::class, 'show']);
        Route::post('/store', [JobController::class, 'store']);
        Route::put('/update/{id}', [JobController::class, 'update']);
        Route::delete('/delete/{id}', [JobController::class, 'delete']);
    });

    //ENTITY
    Route::group(['prefix' => 'entities'], function () {
        Route::get('/index',  [EntityController::class, 'index']);
        Route::get('/show/{id}', [EntityController::class, 'show']);
        Route::post('/store', [EntityController::class, 'store']);
        Route::put('/update/{id}', [EntityController::class, 'update']);
        Route::delete('/delete/{id}', [EntityController::class, 'delete']);
    });

    //WORKER
    Route::group(['prefix' => 'workers'], function () {
        Route::get('/index',  [WorkerController::class, 'index']);
        Route::get('/show/{id}', [WorkerController::class, 'show']);
        Route::post('/store', [WorkerController::class, 'store']);
        Route::post('/update/{id}', [WorkerController::class, 'update']);
        Route::delete('/delete/{id}', [WorkerController::class, 'delete']);
    });
});
