<?php

namespace Database\Seeders;

use App\Models\WorkerTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerTitleSeeder extends Seeder
{
    private $workerTitles = [
        [
            "title" => "Direktör",
            "hierarchy" => 1,
        ],
        [
            "title" => "Müdür",
            "hierarchy" => 2,
        ],
        [
            "title" => "Yönetici",
            "hierarchy" => 3,
        ],
        [
            "title" => "Uzman",
            "hierarchy" => 4,
        ],
    ];
    
    public function run(): void
    {
        WorkerTitle::insert($this->workerTitles);
    }
}
