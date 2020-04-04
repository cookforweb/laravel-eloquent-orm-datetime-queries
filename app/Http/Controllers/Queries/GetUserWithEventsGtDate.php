<?php

namespace App\Http\Controllers\Queries;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GetUserWithEventsGtDate extends Controller
{
    public function run()
    {
        $filter = new \DateTime('2020-05-20');

        $result = User::with(['events' => function($q) use ($filter) {
            $q->where('from', '>', $filter->format('Y-m-d H:i:s'));
        }])
            ->withCount(['events' => function($q) use ($filter) {
                $q->where('from', '>', $filter->format('Y-m-d H:i:s'));
            }])
            ->find(1);

        dd($result->toArray());
//        return response()->json($result, 200);
    }
}
