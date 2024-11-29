<?php

use App\Http\Controllers\Api\Department\Controllers\DepartmentController;
use App\Http\Controllers\Api\Worker\Controllers\WorkerController;
use App\Http\Controllers\Api\WorkerTitle\Controllers\WorkerTitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('worker',WorkerController::class);
Route::apiResource('department',DepartmentController::class);
Route::apiResource('worker_title',WorkerTitleController::class);
Route::get('/workers_with_childrens',[WorkerController::class,"getWorkersWithChildrens"]);
Route::get('/get_workers_by_department_and_title/{departmentId}/{titleId}',[WorkerController::class,"getWorkersByDepartmentAndTitle"]);
Route::get('/check_chairman_of_the_board',[WorkerController::class,"checkChairmanOfTheBoard"]);
Route::post('/create_chairmen_of_the_board',[WorkerController::class,"createChairmenOfTheBoard"]);

