<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserActivitySeeder extends Seeder
{

    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            for ($i = 0; $i < rand(5, 15); $i++) {
                Activity::create([
                    'user_id' => $user->id,
                    'performed_at' => Carbon::now()->subDays(rand(0, 30)),
                    'points' => 20,
                ]);
            }
        }
    }
}
