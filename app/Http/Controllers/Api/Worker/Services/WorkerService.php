<?php 

namespace App\Http\Controllers\Api\Worker\Services;

use App\Http\Controllers\Api\Department\Services\DepartmentService;
use App\Http\Controllers\Api\Worker\Interfaces\WorkerRepositoryInterface;
use App\Http\Controllers\Api\WorkerTitle\Services\WorkerTitleService;

class WorkerService{
    private $repository; 

    public function __construct(WorkerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createWorker($request){
        $department = app()->make(DepartmentService::class)->getDepartmentById($request['department_id']);
        $upperTitle = app()->make(WorkerTitleService::class)->getUpperWorkerTitleById($request['title_id']);
        if($upperTitle){
            $upperWorkers = $this->repository->getWorkersByDepartmentAndTitle($department->id,$upperTitle->id);
            if(count($upperWorkers) == 0){
                return false;
            }else if(count($upperWorkers) == 1){
                $workerId = $upperWorkers[0]->id;
            }else{
                $workerId = $request->upper_worker_id;
            }
    
            $request['parent_id'] = $workerId;
            return $this->repository->createWorker($request);
        }else{
            $chairmanOfTheBoard = $this->repository->getWorkerByDepartmentId(1);
            $request['parent_id'] = $chairmanOfTheBoard->id;
            return $this->repository->createWorker($request);
        }
    }

    public function getWorkersWithChildrens(){
        return $this->repository->getWorkersWithChildrens();
    }

    public function getWorkersByDepartmentAndTitle($departmentId,$titleId){
        $department = app()->make(DepartmentService::class)->getDepartmentById($departmentId);
        $upperTitle = app()->make(WorkerTitleService::class)->getUpperWorkerTitleById($titleId);
        if($upperTitle){
            return $this->repository->getWorkersByDepartmentAndTitle($department->id,$upperTitle->id);
        }else{
            return [
                "service_response" => false,
                "message" => "Belirtilen unvan bir departmandaki en yüksek unvandır. Bu kişinin üst kişisi yönetim kurulu başkanı olacaktır." 
            ];
        }
    }

    public function getChairmanOfTheBoard(){
        $chairmanOfTheBoard = $this->repository->getWorkerByDepartmentId(1);

        if($chairmanOfTheBoard){
            return true;
        }else{
            return false;
        }
    }

    public function createChairmenOfTheBoard($request){
        $checkChairmenOfTheBoard = $this->getChairmanOfTheBoard();

        if($checkChairmenOfTheBoard){
            return [
                "service_response" => false,
                "message" => "Mevcutta yönetim kurulu başkanı bulunmaktadır"
            ];
        }else{
            $request['department_id'] = 1;
            $request['title_id'] = 1;
            return $this->repository->createChairmenOfTheBoard($request);
        }
    }
}