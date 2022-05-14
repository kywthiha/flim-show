<?php

namespace App\Repositories;

use App\Interfaces\TimeScheduleRepositoryInterface;
use App\Models\TimeSchedule;
use App\Models\User;

class TimeScheduleRepository implements TimeScheduleRepositoryInterface
{
    public function store(User $user, array $data): TimeSchedule
    {
        return $user->timeSchedules()->create($data);
    }

    public function update(TimeSchedule $timeSchedule): TimeSchedule
    {
        $timeSchedule->update($timeSchedule->getDirty());
        return $timeSchedule;
    }

    public function delete(TimeSchedule $timeSchedule): void
    {
        $timeSchedule->delete();
    }

    public function getTimeSchedule(User $user): TimeSchedule
    {
        return $user->timeSchedules()->latest()->first();
    }
}
