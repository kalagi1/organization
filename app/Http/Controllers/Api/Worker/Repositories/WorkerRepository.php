<?php 

namespace App\Http\Controllers\Api\Worker\Repositories;

use App\Http\Controllers\Api\Worker\Interfaces\WorkerRepositoryInterface;
use App\Models\Worker;

class WorkerRepository implements WorkerRepositoryInterface{
    private $worker;

    public function createWorker($request){
        return $this->worker->create([
            "name" => $request['name'],
            "department_id" => $request['department_id'],
            "title_id" => $request['title_id'],
            'parent_id' => $request['parent_id']
        ]);
    }

    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

    public function getWorkersWithChildrens()
    {
        return $this->worker->with('childrens','parent')->withCount('childrens','parent')->where('department_id',1)->get();
    }

    public function getWorkersByDepartmentAndTitle($departmentId, $titleId)
    {
        return $this->worker->where('department_id',$departmentId)->where('title_id',$titleId)->get();
    }

    public function getWorkerByDepartmentId($departmentId){
        return $this->worker->where('department_id',$departmentId)->first();
    }

    public function createChairmenOfTheBoard($request){
        return $this->worker->create([
            "name" => $request['name'],
            "department_id" => $request['department_id'],
            "title_id" => $request['title_id'],
            'parent_id' => null
        ]);
    }
}