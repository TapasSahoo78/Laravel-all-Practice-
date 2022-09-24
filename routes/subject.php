<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test\SubjectController;

Route::get('subject', [SubjectController::class, 'index']);
Route::post('add-subject', [SubjectController::class, 'addSubject'])->name('addSubject');
