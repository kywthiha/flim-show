<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeScheduleConfirguationRequest extends FormRequest
{
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
            'walking_time__bus_stop' => 'required|date_format:H:i',
            'time_taken_bus_stop' => 'required|date_format:H:i',
            'movie_time' => 'required|array',
            'movie_time.*' => 'required|date_format:H:i',
        ];
    }
}
