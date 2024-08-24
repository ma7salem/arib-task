<?php

use App\Http\Controllers\Auth\EmployeeAuthController;
use App\Http\Controllers\Auth\ManagerAuthController;
use App\Http\Controllers\Employee\HomeController;
use App\Http\Controllers\Manager\DepartmentController;
use App\Http\Controllers\Manager\EmployeeController;
use App\Http\Controllers\Manager\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:web']], function () {    
    Route::get('/login', [ManagerAuthController::class, 'getForm'])->name('login');
    Route::post('/login', [ManagerAuthController::class, 'postForm'])->name('login.post');
});

Route::group(['middleware' => ['guest:employees']], function () {    
    Route::get('/emp-login', [EmployeeAuthController::class, 'getForm'])->name('emp_login');
    Route::post('/emp-login', [EmployeeAuthController::class, 'postForm'])->name('emp_login.post');
});


Route::group(['middleware' => ['auth:web']], function () {    
    Route::post('/logout', [ManagerAuthController::class, 'logout'])->name('logout');

    Route::resource('departments', DepartmentController::class)->middleware('check.department');
    Route::resource('employees', EmployeeController::class)->middleware('check.employee');
    Route::resource('tasks', TaskController::class)->only('index', 'create', 'store');
});


Route::group(['middleware' => ['auth:employees']], function () {    
    Route::post('/emp-logout', [EmployeeAuthController::class, 'logout'])->name('emp_logout');

    Route::get('/emp', [HomeController::class, 'index'])->name('emp_home');

    Route::get('/emp/tasks/{task}', [HomeController::class, 'edit'])->name('tasks.edit')->middleware('check.task');
    Route::put('/emp/tasks/{task}', [HomeController::class, 'update'])->name('tasks.update')->middleware('check.task');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');
