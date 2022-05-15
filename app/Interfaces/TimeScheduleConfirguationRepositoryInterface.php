<?php

namespace App\Interfaces;

use App\Models\TimeScheduleConfirguation;
use App\Models\User;

interface TimeScheduleConfirguationRepositoryInterface
{
    public function store(User $user, array $data): TimeScheduleConfirguation;
    public function update(TimeScheduleConfirguation $timeScheduleConfirguation): TimeScheduleConfirguation;
    public function delete(TimeScheduleConfirguation $timeScheduleConfirguation): void;
    public function getTimeScheduleConfirguation(User $user): ?TimeScheduleConfirguation;
}
