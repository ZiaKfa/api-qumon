<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::middleware('auth.basic')->group(function () {
    Route::apiResource('/users', App\Http\Controllers\UserController::class);
    Route::apiResource('/quiz', App\Http\Controllers\QuizController::class);
    Route::apiResource('/kategori', App\Http\Controllers\CategoryController::class);
    Route::get('/leaderboard', 'App\Http\Controllers\LeaderboardController@index');
    Route::get('/leaderboard/weekly', 'App\Http\Controllers\LeaderboardController@weekly');
    Route::get('/users/category', 'App\Http\Controllers\LeaderboardController@showCategory');
    Route::get('/quiz/user/{id}', 'App\Http\Controllers\QuizController@findQuizByUser');
    Route::get('/quiz/category/{id}', 'App\Http\Controllers\QuizController@findQuizByCategory');
    Route::get('/quiz/{user_id}/{category_id}', 'App\Http\Controllers\QuizController@findQuizByUserAndCategory');
    Route::apiResource('/answer', App\Http\Controllers\AnswerController::class);
    Route::apiResource('/useranswer', App\Http\Controllers\UserAnswerController::class);
});
