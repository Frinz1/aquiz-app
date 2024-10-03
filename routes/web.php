<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('/home', function () {
    return view('welcome');
})->name('home');


Route::get('/admin/home', function () {
    return view('admin.home'); 
})->name('admin.home');

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth')->name('redirect');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');


Route::get('/admin/quizzes', [AdminController::class, 'quizzes'])->name('admin.quizzes');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
Route::post('/quizzes', [AdminController::class, 'createQuiz'])->name('admin.quizzes.create');
    Route::put('/quizzes/{quiz}', [AdminController::class, 'updateQuiz'])->name('admin.quizzes.update');
    Route::delete('/quizzes/{quiz}', [AdminController::class, 'deleteQuiz'])->name('admin.quizzes.delete');