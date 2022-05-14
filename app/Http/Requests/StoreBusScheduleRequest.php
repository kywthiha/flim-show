<?php

namespace App\Http\Requests;

use App\Interfaces\TimeScheduleRepositoryInterface;
use App\Models\TimeSchedule;
use App\Services\TimeScheduleService;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusScheduleRequest extends FormRequest
{

    private TimeScheduleService $timeScheduleService;

    public function __construct(TimeScheduleService $timeScheduleService)
    {
        $this->timeScheduleService = $timeScheduleService;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'bus_time' => 'required|date_format:H:i',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->bus_time) {
                $timeSchedule = $this->timeScheduleService->isTimeScheduleExists(auth()->user());
                if ($timeSchedule) {
                    $available = $this->timeScheduleService->isAvailableBusSchedule(auth()->user(), $timeSchedule, $this->bus_time);
                    if (!$available['status']) {
                        $validator->errors()->add('bus_time', "The bus time is greater than " . $available['total_waiting_time']->format('H:i'));
                    }
                } else {
                    $validator->errors()->add('bus_time', 'The  time schedule is not exists');
                }
            }
        });
    }
}
