<?php

use App\Http\Controllers\Api\Course\{
    CourseController
};
use Illuminate\Support\Facades\Route;

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/', function () {
    return response()->json([
        'sucess' => true,
    ]);
});
