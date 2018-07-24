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

        return '[
    "0",
    {   
        "title": "Test event",
        "id": "821",
        "end": "2018-07-24 14:00:00",
        "start": "2018-07-024 06:00:00"
    },
    "1",
    {     
        "title": "Seba",
        "id": "822",
        "end": "2018-07-24 17:00:00",
        "start": "2018-07-024 015:00:00"
    }
]';
    }

}
