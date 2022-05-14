<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeScheduleRequest extends FormRequest
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
            'alarm_time' => 'required|date_format:H:i',
            'time_to_teeth' => 'required|date_format:H:i',
            'breakfast_time' => 'required|date_format:H:i',
        ];
    }
}
