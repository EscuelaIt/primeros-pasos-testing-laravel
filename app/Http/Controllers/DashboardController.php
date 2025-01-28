<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $timetables = Timetable::all();
        return view('dashboard.index')->with([
            'timetables' => $timetables,
        ]);
    }
}
