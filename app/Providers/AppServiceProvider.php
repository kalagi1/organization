<?php

namespace App\Providers;

use App\Http\Controllers\Api\Department\Interfaces\DepartmentRepositoryInterface;
use App\Http\Controllers\Api\Department\Repositories\DepartmentRepository;
use App\Http\Controllers\Api\Worker\Interfaces\WorkerRepositoryInterface;
use App\Http\Controllers\Api\Worker\Repositories\WorkerRepository;
use App\Http\Controllers\Api\WorkerTitle\Interfaces\WorkerTitleRepositoryInterface;
use App\Http\Controllers\Api\WorkerTitle\Repositories\WorkerTitleRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WorkerRepositoryInterface::class, WorkerRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(WorkerTitleRepositoryInterface::class, WorkerTitleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
