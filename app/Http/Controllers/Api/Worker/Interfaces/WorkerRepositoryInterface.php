<?php 

namespace App\Http\Controllers\Api\Worker\Interfaces;

interface WorkerRepositoryInterface{
    public function createWorker($request);
    public function getWorkersWithChildrens();
    public function getWorkersByDepartmentAndTitle($departmentId,$titleId);
    public function getWorkerByDepartmentId($departmentId);
    public function createChairmenOfTheBoard($request);
}