<?php

namespace App\Http\Controllers\Queries;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GetUsersWithEventsBetweenDates extends Controller
{
    public function run()
    {
        $from = new \DateTime('2020-05-01');
        $to = new \DateTime('2020-05-30');

        $result = User::with(['events' => function($q) use ($from, $to) {
                $q->where('from', '>', $from->format('Y-m-d H:i:s'))
                    ->where('to', '<', $to->format('Y-m-d H:i:s'));
            }])
            ->get();

        dd($result->toArray());
//        return response()->json($result, 200);
    }
}
