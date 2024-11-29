<?php 

namespace App\Http\Controllers\Api\Department\Interfaces;

use Illuminate\Http\Request;

interface DepartmentRepositoryInterface{
    public function getDepartments();
    public function createDepartment($request);
    public function getDepartmentById($id);
    public function updateDepartmentById($id,$request);
    public function deleteDepartmentById($id);
}