<?php

namespace App\Http\Controllers\Api\Worker\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
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
        ];
    }
}
