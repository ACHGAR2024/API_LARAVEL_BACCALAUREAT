<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\ExamController;
use App\Http\Controllers\API\ResultController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('students', StudentController::class);
Route::apiResource('exams', ExamController::class);
Route::apiResource('results', ResultController::class);