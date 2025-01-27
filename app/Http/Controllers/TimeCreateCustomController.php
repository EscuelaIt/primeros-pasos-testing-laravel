<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\ActivityTimeStamp;

class TimeCreateCustomController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $activityTimeStamp = new ActivityTimeStamp("10", "2");

        // try {
        //     $activityTimeStamp = new ActivityTimeStamp("10", "2");
        // } catch(\InvalidArgumentException $e) {

        // }
    }
}
