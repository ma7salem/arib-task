<?php

use App\Http\Controllers\Auth\ManagerAuthController;
use App\Http\Controllers\Manager\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:web']], function () {    
    Route::get('/login', [ManagerAuthController::class, 'getForm'])->name('login');
    Route::post('/login', [ManagerAuthController::class, 'postForm'])->name('login.post');
});


Route::group(['middleware' => ['auth:web']], function () {    
    Route::post('/logout', [ManagerAuthController::class, 'logout'])->name('logout');

    Route::resource('departments', DepartmentController::class);
});


Route::get('/', function () {
    return view('welcome');
})->name('home');
