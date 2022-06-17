<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\TeacherCourseController;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\ReportController;

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

Route::post('/login',[AuthController::class,'login'])->name('login');


Route::controller(UserController::class)->middleware('client')->prefix('user')->name('user.')->group(function (){
    Route::get('{type}','index')->name('index');
    Route::post('/register/student','registerStudent')->name('register.student');
    Route::post('/register/teacher','registerTeacher')->name('register.teacher');
    Route::put('{user}','update')->name('update');
    Route::put('/password/{user}','updatePassword')->name('password');
});

Route::middleware('client')->group(function (){
    Route::apiResource('course',CourseController::class)->except('show');
    Route::post('teacher-course',[TeacherCourseController::class,'store'])->name('teacher-course.store');
    Route::delete('teacher-course',[TeacherCourseController::class,'destroy'])->name('teacher-course.destroy');
    Route::post('score',[ScoreController::class,'store'])->name('score.store');
    Route::get('report',[ReportController::class,'reportStudentCurse'])->name('report');
});


