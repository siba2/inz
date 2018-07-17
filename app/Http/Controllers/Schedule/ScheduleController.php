<?php

namespace App\Http\Controllers\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('schedule/index');
    }

    public function getAll() {

        $schedules = Schedule::select()->get();

        $xml = '<xml>';

        foreach ($schedules as $schedule) {
            $xml .= '<event id="' . $schedule->id . '" title="' . $schedule->info . '"  start="' . $schedule->date . '" />';
        }

        $xml .= '</xml>';

        return $xml;
    }

}
