<?php 

namespace App\Http\Controllers\Api\WorkerTitle\Interfaces;

interface WorkerTitleRepositoryInterface{
    public function getWorkerTitles();
    public function createWorkerTitle($request);
    public function getWorkerTitleById($id);
    public function updateWorkerTitleById($request,$id);
    public function deleteWorkerTitleById($id);
    public function getWorkerTitleByHierarchy($hierarchy);
}