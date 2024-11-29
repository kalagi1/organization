<?php 

namespace App\Http\Controllers\Api\WorkerTitle\Repositories;

use App\Http\Controllers\Api\WorkerTitle\Interfaces\WorkerTitleRepositoryInterface;
use App\Models\WorkerTitle;

class WorkerTitleRepository implements WorkerTitleRepositoryInterface{
    private $workerTitle;

    public function __construct(WorkerTitle $workerTitle)
    {
        $this->workerTitle = $workerTitle;
    }

    public function getWorkerTitles()
    {
        return $this->workerTitle->get();
    }

    public function createWorkerTitle($request)
    {
        
    }

    public function getWorkerTitleById($id)
    {
        return $this->workerTitle->where('id',$id)->first();
    }

    public function updateWorkerTitleById($request, $id)
    {
        
    }

    public function deleteWorkerTitleById($id)
    {
        
    }

    public function getWorkerTitleByHierarchy($hierarchy)
    {
        return $this->workerTitle->where('hierarchy',$hierarchy)->first();
    }
}