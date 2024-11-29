<?php

namespace App\Http\Controllers\Api\Worker\Controllers;

use App\Http\Controllers\Api\Worker\Requests\CreateChairmenOfTheBoardRequest;
use App\Http\Controllers\Api\Worker\Requests\CreateWorkerRequest;
use App\Http\Controllers\Api\Worker\Resources\WorkerResource;
use App\Http\Controllers\Api\Worker\Resources\WorkerResourceWithChildren;
use App\Http\Controllers\Api\Worker\Services\WorkerService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WorkerController extends Controller
{
    private $service;

    public function __construct(WorkerService $service)
    {
        $this->service = $service;
    }

    public function store(CreateWorkerRequest $request){
        $createWorker = $this->service->createWorker($request->all());

        if($createWorker){
            return Response::json([],201);
        }
    }
    
    public function getWorkersWithChildrens(){
        return WorkerResourceWithChildren::collection($this->service->getWorkersWithChildrens());
    }

    public function getWorkersByDepartmentAndTitle($department,$title){
        $upperWorkers = $this->service->getWorkersByDepartmentAndTitle($department,$title);
        if(isset($upperWorkers['service_response']) && !$upperWorkers['service_response']){
            return Response::json([
                "status" => "info",
                "message" => $upperWorkers['message']
            ],200);
        }else{
            return WorkerResourceWithChildren::collection($this->service->getWorkersByDepartmentAndTitle($department,$title));
        }
    }

    public function checkChairmanOfTheBoard(){
        $checkChairmanOfTheBoard = $this->service->getChairmanOfTheBoard();
        if($checkChairmanOfTheBoard){
            return Response::json([

            ],200);
        }else{
            return Response::json([

            ],404);
        }
    }

    public function createChairmenOfTheBoard(CreateChairmenOfTheBoardRequest $request){
        $createChairmenOfTheBoard = $this->service->createChairmenOfTheBoard($request->all());  

        if(isset($createChairmenOfTheBoard['service_response']) && !$createChairmenOfTheBoard['service_response']){
            return Response::json([
                "status" => "info",
                "message" => $createChairmenOfTheBoard['message']
            ],200);
        }else{
            return Response::json([
                
            ],201);
        }
    }
}
