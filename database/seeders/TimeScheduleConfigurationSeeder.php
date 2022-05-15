<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TimeScheduleConfigurationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->timeScheduleConfirguations()->create([
                'user_id' => $user->id,
                'walking_time__bus_stop' => '00:15',
                'time_taken_bus_stop' => "00:45",
                'movie_time' => [
                    "10:00",
                    "12:30",
                    "15:30",
                    "18:30",
                ],
            ]);
        }
    }
}
