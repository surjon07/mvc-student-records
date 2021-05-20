<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\GradesController;

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

// Accounts
Route::match(['get', 'post'], '/accounts/list',     [AccountController::class, 'list']);
Route::match(['get', 'post'], '/accounts/item',     [AccountController::class, 'item']);
Route::match(['get', 'post'], '/accounts/create',   [AccountController::class, 'create']);
Route::match(['get', 'post'], '/accounts/update',   [AccountController::class, 'update']);
Route::match(['get', 'post'], '/accounts/delete',   [AccountController::class, 'delete']);

// Students
Route::match(['get', 'post'], '/students/list',     [StudentController::class, 'list']);
Route::match(['get', 'post'], '/students/item',     [StudentController::class, 'item']);
Route::match(['get', 'post'], '/students/create',   [StudentController::class, 'create']);
Route::match(['get', 'post'], '/students/update',   [StudentController::class, 'update']);
Route::match(['get', 'post'], '/students/delete',   [StudentController::class, 'delete']);

// Courses
Route::match(['get', 'post'], '/courses/list',     [CourseController::class, 'list']);
Route::match(['get', 'post'], '/courses/item',     [CourseController::class, 'item']);
Route::match(['get', 'post'], '/courses/create',   [CourseController::class, 'create']);
Route::match(['get', 'post'], '/courses/update',   [CourseController::class, 'update']);
Route::match(['get', 'post'], '/courses/delete',   [CourseController::class, 'delete']);

// Subjects
Route::match(['get', 'post'], '/subjects/list',     [SubjectsController::class, 'list']);
Route::match(['get', 'post'], '/subjects/item',     [SubjectsController::class, 'item']);
Route::match(['get', 'post'], '/subjects/create',   [SubjectsController::class, 'create']);
Route::match(['get', 'post'], '/subjects/update',   [SubjectsController::class, 'update']);
Route::match(['get', 'post'], '/subjects/delete',   [SubjectsController::class, 'delete']);

// Grades
Route::match(['get', 'post'], '/grades/list',     [GradesController::class, 'list']);
Route::match(['get', 'post'], '/grades/item',     [GradesController::class, 'item']);
Route::match(['get', 'post'], '/grades/create',   [GradesController::class, 'create']);
Route::match(['get', 'post'], '/grades/update',   [GradesController::class, 'update']);
Route::match(['get', 'post'], '/grades/delete',   [GradesController::class, 'delete']);
