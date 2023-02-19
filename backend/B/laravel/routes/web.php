<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/submissions', [SubmissionController::class, 'index'])->name('submission.index');

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/login', [UserController::class, 'toLoginForm'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login']);
// Route::get('/login', [SubmissionController::class, 'index'])->name('submission.index');
