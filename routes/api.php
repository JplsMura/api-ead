<?php

use App\Http\Controllers\Api\Course\{
    CourseController,
    LessonController,
    ModuleController,
    ReplySupportController,
    SupportController
};
use Illuminate\Support\Facades\Route;

// Courses
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

// Modules
Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

// Lesson
Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
Route::get('/lesson/{id}', [LessonController::class, 'show']);

// Support
Route::get('/supports', [SupportController::class, 'index']);
Route::get('/support/{id}', [SupportController::class, 'getSupport']);
Route::post('/supports', [SupportController::class, 'store']);
Route::post('/replies', [ReplySupportController::class, 'createReply']);

Route::get('/', function () {
    return response()->json([
        'sucess' => true,
    ]);
});
