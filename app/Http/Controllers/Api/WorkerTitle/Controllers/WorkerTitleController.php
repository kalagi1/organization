<?php

namespace App\Http\Controllers\Api\WorkerTitle\Controllers;

use App\Http\Controllers\Api\WorkerTitle\Resources\WorkerTitleResource;
use App\Http\Controllers\Api\WorkerTitle\Services\WorkerTitleService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkerTitleController extends Controller
{
    private $service; 

    public function __construct(WorkerTitleService $service)
    {
        $this->service = $service;
    }

    public function index(){
        return WorkerTitleResource::collection($this->service->getWorkerTitles());
    }
}
