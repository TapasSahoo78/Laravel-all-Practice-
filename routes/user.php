<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//User Routes
Route::get('users',[UserController::class,'index']);
Route::get('user',[UserController::class,'addData']);
