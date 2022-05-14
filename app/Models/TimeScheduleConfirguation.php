<?php

namespace App\Models;

use App\Casts\CarbonIntervalCast;
use App\Casts\JsonDateTimeCast;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeScheduleConfirguation extends Model
{
    use HasFactory;

    protected $casts = [
        'movie_time' => JsonDateTimeCast::class,
    ];

    protected $fillable = [
        'walking_time__bus_stop',
        'time_taken_bus_stop',
        'movie_time',
        'user_id',
    ];

    protected function WalkingTimeBusStopInterval(): Attribute
    {
        return Attribute::make(
            get: fn () => CarbonInterval::createFromFormat('H:i:s', $this->walking_time__bus_stop),
        );
    }


    protected function timeTakenBusStopInterval(): Attribute
    {
        return Attribute::make(
            get: fn () => CarbonInterval::createFromFormat('H:i:s', $this->time_taken_bus_stop),
        );
    }
}
