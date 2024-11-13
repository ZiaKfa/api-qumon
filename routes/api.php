<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', App\Http\Controllers\UserController::class);
Route::apiResource('/quiz', App\Http\Controllers\QuizController::class);
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::get('/leaderboard', 'App\Http\Controllers\LeaderboardController@index');
Route::get('/leaderboard/weekly', 'App\Http\Controllers\LeaderboardController@weekly');
