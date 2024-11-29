<?php

namespace App\Http\Controllers\Api\Department\Controllers;

use App\Http\Controllers\Api\Department\Requests\CreateDepartmentRequest;
use App\Http\Controllers\Api\Department\Resources\DepartmentResource;
use App\Http\Controllers\Api\Department\Services\DepartmentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Throwable;

class DepartmentController extends Controller
{
    private $service;

    public function __construct(DepartmentService $service)
    {
        $this->service = $service;
    }

    public function index(){
        return DepartmentResource::collection($this->service->getDepartments());
    }

    public function store(CreateDepartmentRequest $request){
        try{
            $department = $this->service->createDepartment($request);

            if($department){
                Response::json([],201);
            }
        }catch(Throwable $e){
            Response::json([
                "error" => $e->getMessage(),
            ],503); 
        }
    }
}
