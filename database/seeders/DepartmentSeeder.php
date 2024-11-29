<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    private $departments = [
        [
            "title" => "Yönetim Kurulu",
            "hierarchy" => 1,
        ],
        [
            "title" => "Üretim Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "Finans Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "Pazarlama Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "Satış Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "İnsan Kaynakları Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "Hukuk Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "Bilgi Teknolojileri Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "AR-GE Departmanı",
            "hierarchy" => 2,
        ],
        [
            "title" => "Müşteri Hizmetleri Departmanı",
            "hierarchy" => 2,
        ],
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert($this->departments);
    }
}
