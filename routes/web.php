<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/dashboard',    [PageController::class, 'dashboard']);
Route::get('/accounts',     [PageController::class, 'accounts']);
Route::get('/students',     [PageController::class, 'students']);
Route::get('/courses',      [PageController::class, 'courses']);
Route::get('/subjects',     [PageController::class, 'subjects']);
Route::get('/grades',       [PageController::class, 'grades']);
