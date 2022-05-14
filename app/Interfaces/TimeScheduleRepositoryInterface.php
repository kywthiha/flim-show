<?php

namespace App\Interfaces;

use App\Models\TimeSchedule;
use App\Models\User;

interface TimeScheduleRepositoryInterface
{
    public function store(User $user, array $data): TimeSchedule;
    public function update(TimeSchedule $timeSchedule): TimeSchedule;
    public function delete(TimeSchedule $timeSchedule): void;
    public function getTimeSchedule(User $user): TimeSchedule;
}
