<?php

namespace App\Http\Controllers\Api\Worker\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResourceWithChildren extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "title" => $this->parent_id ? $this->department->title." ".$this->workerTitle->title : "Yönetim Kurulu Başkanı",
            "relationship" => [
                "children_num" => count($this->childrens),
                "parent_num" => $this->parent ? 1 : 0
            ],
            "department" => $this->department,
            "worker_title" => $this->workerTitle,
            "is_chairmen_of_the_board" => !$this->parent_id ? true : false,
            "children" => WorkerResourceWithChildren::collection($this->childrens)
        ];
    }
}
