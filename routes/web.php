<?php

use App\Http\Controllers\ViewController\ListController;
use App\Http\Controllers\ViewController\WorkerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[ListController::class,"index"]);
Route::get('/worker/create',[WorkerController::class,"create"]);