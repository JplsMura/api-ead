<?php

use App\Http\Controllers\Api\Course\{
    CourseController
};
use Illuminate\Support\Facades\Route;

// Courses
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/', function () {
    return response()->json([
        'sucess' => true,
    ]);
});
