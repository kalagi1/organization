<?php 

namespace App\Http\Controllers\Api\Department\Repositories;

use App\Http\Controllers\Api\Department\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentRepository implements DepartmentRepositoryInterface{
    private $department;

    public function __construct(Department $department)
    {
        $this->department = $department;   
    }

    public function getDepartments()
    {
        return $this->department->where('id','!=',1)->get();
    }

    public function createDepartment($request)
    {
        
    }

    public function getDepartmentById($id)
    {
        return $this->department->where('id',$id)->first();   
    }

    public function updateDepartmentById($id,$request)
    {
        
    }

    public function deleteDepartmentById($id)
    {
        
    }
}