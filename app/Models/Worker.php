<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $guarded = [];

    public function childrens(){
        return $this->hasMany(Worker::class,"parent_id","id");
    }

    public function department(){
        return $this->hasOne(Department::class,"id","department_id");
    }

    public function workerTitle(){
        return $this->hasOne(WorkerTitle::class,"id","title_id");
    }

    public function parent(){
        return $this->hasOne(Department::class,"id","parent_id");
    }
}
