<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\ABCController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

//Using Route Middleware
Route::get('/contact', function () {
    return view('welcome');
})->middleware('Age');

Route::get('role', [TestController::class, 'index'])->middleware('Role:editor');

Route::get('terminate', [ABCController::class, 'index'])->middleware('Terminate');

Route::get('todo', [TodoController::class, 'index']);
Route::post('todo', [TodoController::class, 'addTodo'])->name('addTodo');

