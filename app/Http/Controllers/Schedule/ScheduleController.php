<?php

namespace App\Http\Controllers\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\Http\Requests\StoreSchedule;

class ScheduleController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('schedule/index');
    }

    public function store(StoreSchedule $request) {
        $model = new Schedule;
        $model->start = $request->start;
        $model->title = $request->title;
        $model->save();

        return redirect()->to('schedule')->with('success', trans('t_messages.content.success.add'));
    }

    public function getAll() {
        $model = Schedule::select()->get();

        return $model;
    }

}
