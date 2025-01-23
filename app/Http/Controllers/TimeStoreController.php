<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'hour' => [
                'required',
                'regex:/^(0?[0-9]|1[0-9]|2[0-3])$/', // Permite valores de 0 a 23
            ],
            'minute' => 'required|in:00,15,30,45',
        ]);

        $time = $request->hour . ':' . $request->minute;
        return view('dashboard.show-time')->with([
            'time' => $time,
        ]);
    }
}
