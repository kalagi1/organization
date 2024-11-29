<?php 

namespace App\Http\Controllers\Api\WorkerTitle\Services;

use App\Http\Controllers\Api\WorkerTitle\Interfaces\WorkerTitleRepositoryInterface;

class WorkerTitleService{
    private $repository;

    public function __construct(WorkerTitleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getWorkerTitles(){
        return $this->repository->getWorkerTitles();
    }

    public function getUpperWorkerTitleById($id){
        $workerTitle = $this->repository->getWorkerTitleById($id);
        return $this->repository->getWorkerTitleByHierarchy($workerTitle->hierarchy - 1);
    }
}