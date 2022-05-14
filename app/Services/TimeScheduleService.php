<?php

namespace App\Services;


use App\Interfaces\TimeScheduleRepositoryInterface;
use App\Models\BusSchedule;
use App\Models\TimeSchedule;
use App\Models\TimeScheduleConfirguation;
use App\Models\User;
use App\Repositories\TimeScheduleConfirguationRepository;
use Carbon\Carbon;

class TimeScheduleService
{
    private TimeScheduleRepositoryInterface $timeScheduleRepository;
    private TimeScheduleConfirguationRepository $timeScheduleConfirguationRepository;

    public function __construct(TimeScheduleRepositoryInterface $timeScheduleRepository, TimeScheduleConfirguationRepository $timeScheduleConfirguationRepository)
    {
        $this->timeScheduleRepository = $timeScheduleRepository;
        $this->timeScheduleConfirguationRepository = $timeScheduleConfirguationRepository;
    }

    public function isTimeScheduleExists(User $user): ?TimeSchedule
    {
        return $this->timeScheduleRepository->getTimeSchedule($user);
    }

    public function isAvailableBusSchedule(User $user, TimeSchedule $timeSchedule, string $bus_time): array
    {
        $bus_time_carbon = Carbon::createFromFormat('H:i',  $bus_time);

        $timeScheuleConfirguation = $this->timeScheduleConfirguationRepository->getTimeScheduleConfirguation($user);

        $totalWaitingTime = $timeSchedule->alarm_time->addMinutes($timeSchedule->time_to_teeth_interval->minutes)->addMinutes($timeSchedule->breakfast_time_interval->minutes)->addMinutes($timeScheuleConfirguation->walking_time_bus_stop_interval->minutes);
        return [
            'status' => (bool) $totalWaitingTime->lessThanOrEqualTo($bus_time_carbon),
            'total_waiting_time' => $totalWaitingTime,
        ];
    }

    public function catchMovieTime(BusSchedule $busSchedule, TimeScheduleConfirguation $timeScheduleConfirguation): ?Carbon
    {
        return $timeScheduleConfirguation->movie_time->first(function ($value, $key) use ($timeScheduleConfirguation, $busSchedule) {
            return $value->greaterThanOrEqualTo($busSchedule->bus_time->addMinutes($timeScheduleConfirguation->time_taken_bus_stop_interval->minutes));
        });
    }
}
