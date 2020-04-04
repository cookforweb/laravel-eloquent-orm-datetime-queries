<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $key => $user)
        {
            // Create 5 events for each user
            for ($i = 1; $i <= 5; $i++) {

                // Add random days in the next 2 months
                $from = Carbon::createFromDate(2020, 5, 1)->addDays(rand(1, 60));

                DB::table('events')->insert([
                    'title' => "Event#$i by User#$key",
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
                    'from' => $from->format('Y-m-d H:i:s'),
                    'to' => $from->addDays(10)->format('Y-m-d H:i:s'),
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
