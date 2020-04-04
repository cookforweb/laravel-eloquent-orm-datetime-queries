<?php

namespace App\Http\Controllers\Queries;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GetUsersHavingEventsInRange extends Controller
{
    public function run()
    {
        $from = new \DateTime('2020-05-01');
        $to = new \DateTime('2020-05-15');

        $result = User::whereHas('events', function($q) use ($from, $to) {
            $q->where('from', '>', $from->format('Y-m-d H:i:s'))
                ->where('to', '<', $to->format('Y-m-d H:i:s'));
            })
            ->with(['events']) // Will return all the events for each user that satisfy the whereHas criteria
            ->get();

        dd($result->toArray());
//        return response()->json($result, 200);
    }
}
