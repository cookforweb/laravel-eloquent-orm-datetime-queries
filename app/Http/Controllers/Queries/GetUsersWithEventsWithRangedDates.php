<?php

namespace App\Http\Controllers\Queries;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GetUsersWithEventsWithRangedDates extends Controller
{
    public function run()
    {
        $from = [
            new \DateTime('2020-05-01'),
            new \DateTime('2020-05-31'),
        ];
        array_walk($from, function($v){ $v->format('Y-m-d H:i:s'); });

        $to = [
            new \DateTime('2020-06-01'),
            new \DateTime('2020-06-30'),
        ];
        array_walk($to, function($v){ $v->format('Y-m-d H:i:s'); });


        $result = User::whereHas('events', function($q) use ($from, $to){
            $q->whereBetween('from', $from)
                ->whereBetween('to', $to);
        })
            ->with(['events' => function($q) use ($from, $to){
                $q->whereBetween('from', $from)
                    ->whereBetween('to', $to);
            }]) // Will return all the events for each user that satisfy the whereHas criteria
            ->get();

        dd($result->toArray());
//        return response()->json($result, 200);
    }
}
