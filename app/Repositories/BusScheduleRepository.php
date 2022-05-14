<?php

namespace App\Repositories;

use App\Interfaces\BusScheduleRepositoryInterface;
use App\Models\BusSchedule;
use App\Models\User;

class BusScheduleRepository implements BusScheduleRepositoryInterface
{
    public function store(User $user, array $data): BusSchedule
    {
        return $user->busSchedules()->create($data + [
            'user_id' => $user->id,
        ]);
    }

    public function update(BusSchedule $busSchedule): BusSchedule
    {
        $busSchedule->update($busSchedule->getDirty());
        return $busSchedule;
    }

    public function delete(BusSchedule $busSchedule): void
    {
        $busSchedule->delete();
    }

    public function getBusSchedule(User $user): BusSchedule
    {
        return $user->busSchedules()->latest()->first();
    }
}
