<?php

use App\Http\Controllers\Api\Course\{
    CourseController,
    LessonController,
    ModuleController
};
use Illuminate\Support\Facades\Route;

// Courses
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
Route::get('/lesson/{id}', [LessonController::class, 'show']);

Route::get('/', function () {
    return response()->json([
        'sucess' => true,
    ]);
});
