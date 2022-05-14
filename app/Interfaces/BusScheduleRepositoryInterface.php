<?php

namespace App\Interfaces;

use App\Models\BusSchedule;
use App\Models\User;

interface BusScheduleRepositoryInterface
{
    public function store(User $user, array $data): BusSchedule;
    public function update(BusSchedule $busSchedule): BusSchedule;
    public function delete(BusSchedule $busSchedule): void;
    public function getBusSchedule(User $user): BusSchedule;
}
