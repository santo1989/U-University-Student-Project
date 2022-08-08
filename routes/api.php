<?php

use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\ResultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/check', function () {
    return "Hello";
});
Route::get('/admin/course_registration/store/{course_id}/{student_id}/{year}/{course_year}', [CourseRegistrationController::class, 'store']);
Route::get('/admin/course_registration/courses/{student_id}/{year}/{course_year}', [CourseRegistrationController::class, 'showCourses']);

