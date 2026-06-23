<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Homecontroller::class, 'index']);
Route::resource('jobs', JobController::class);
