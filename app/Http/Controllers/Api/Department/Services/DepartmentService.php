<?php 

namespace App\Http\Controllers\Api\Department\Services;

use App\Http\Controllers\Api\Department\Interfaces\DepartmentRepositoryInterface;

class DepartmentService{
    private $repository;
    
    public function __construct(DepartmentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getDepartments(){
        return $this->repository->getDepartments();
    }

    public function createDepartment($request){
        $this->repository->createDepartment($request);
    }

    public function getDepartmentById($id){
        return $this->repository->getDepartmentById($id);
    }
}