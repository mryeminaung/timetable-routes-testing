<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MajorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('majors', MajorController::class);
Route::apiResource('classrooms', ClassRoomController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('faculties', FacultyController::class);
