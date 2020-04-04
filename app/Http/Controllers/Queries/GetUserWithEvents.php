<?php

namespace App\Http\Controllers\Queries;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GetUserWithEvents extends Controller
{
    public function run()
    {
        $result = User::where('id', 1)
            ->with(['events'])
            ->withCount(['events'])
            ->first();

        dd($result->toArray());
//        return response()->json($result, 200);
    }
}
