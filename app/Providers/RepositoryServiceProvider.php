<?php

namespace App\Providers;

use App\Interfaces\ActivityLogRepositoryInterface;
use App\Interfaces\BusScheduleRepositoryInterface;
use App\Interfaces\TimeScheduleConfirguationRepositoryInterface;
use App\Interfaces\TimeScheduleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ActivityLogRepository;
use App\Repositories\BusScheduleRepository;
use App\Repositories\TimeScheduleConfirguationRepository;
use App\Repositories\TimeScheduleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(ActivityLogRepositoryInterface::class, ActivityLogRepository::class);

        $this->app->bind(BusScheduleRepositoryInterface::class, BusScheduleRepository::class);

        $this->app->bind(TimeScheduleRepositoryInterface::class, TimeScheduleRepository::class);

        $this->app->bind(TimeScheduleConfirguationRepositoryInterface::class, TimeScheduleConfirguationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
