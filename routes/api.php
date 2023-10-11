<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'users'], function () {
    Route::group(['prefix' => 'register'], function () {
        Route::post('/', [UserController::class, 'create']);
    });
    Route::group(['prefix' => 'login'], function () {
        Route::post('/', [UserController::class, 'login']);
    });
    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', [UserController::class, 'logout']);
    });
});

Route::group(['prefix' => 'libraries'], function () {
    Route::group(['prefix' => 'lists'], function () {
        Route::get('', [LibraryController::class, 'index']);
    });
    Route::group(['prefix' => 'actions'], function () {
        Route::post('create', [LibraryController::class, 'create']);
        Route::get('find/{book:name}', [LibraryController::class, 'search']);
        Route::put('update/{book:name}', [LibraryController::class, 'update']);
        Route::delete('destroy/{book:name}', [LibraryController::class, 'destroy']);
    });
});


Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'reporting'], function () {
        Route::get('books', [ReportController::class, 'totalBooks']);
    });
});
