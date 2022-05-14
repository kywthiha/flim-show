<?php

namespace App\Repositories;

use App\Interfaces\TimeScheduleConfirguationRepositoryInterface;
use App\Models\TimeScheduleConfirguation;
use App\Models\User;

class TimeScheduleConfirguationRepository implements TimeScheduleConfirguationRepositoryInterface
{
    public function store(User $user, array $data): TimeScheduleConfirguation
    {
        return $user->timeScheduleConfirguations()->create($data + [
            'user_id' => $user->id,
        ]);
    }

    public function update(TimeScheduleConfirguation $timeScheduleConfirguation): TimeScheduleConfirguation
    {
        $timeScheduleConfirguation->update($timeScheduleConfirguation->getDirty());
        return $timeScheduleConfirguation;
    }

    public function delete(TimeScheduleConfirguation $timeScheduleConfirguation): void
    {
        $timeScheduleConfirguation->delete();
    }

    public function getTimeScheduleConfirguation(User $user): TimeScheduleConfirguation
    {
        return $user->timeScheduleConfirguations()->latest()->first();
    }
}
