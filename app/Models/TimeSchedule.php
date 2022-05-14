<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TimeSchedule extends Model
{
    use HasFactory;

    protected $dates = [
        'alarm_time',
    ];

    protected $fillable = [
        'alarm_time',
        'time_to_teeth',
        'breakfast_time',
        'user_id',

    ];

    protected function timeToTeethInterval(): Attribute
    {
        return Attribute::make(
            get: fn () => CarbonInterval::createFromFormat('H:i:s', $this->time_to_teeth),
        );
    }

    protected function breakfastTimeInterval(): Attribute
    {
        return Attribute::make(
            get: fn () => CarbonInterval::createFromFormat('H:i:s', $this->breakfast_time),
        );
    }
}
