<?php

namespace App\Http\Controllers\Employees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Employees;
use App\Http\Requests\StoreEmployees;
use App\Http\Requests\UpdateEmployees;

class EmployeesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('employees/index');
    }

    public function show($id) {
        $model = Employees::find($id);

        return view('employees/show')->with('model', $model);
    }

    public function create() {
        return view('employees/create');
    }

    public function edit($id) {
        $model = Employees::find($id);

        return view('employees/edit')->with('model', $model);
    }

    public function store(StoreEmployees $request) {
        $model = $this->prepareDBquery($request, new Employees);
        $model->save();

        return redirect()->to('employees');
    }

    public function update(UpdateEmployees $request) {
        $model = $this->prepareDBquery($request, Employees::find($request->id));
        $model->save();

        return redirect()->to('employees');
    }

    public function delete($id) {
        $model = Employees::find($id);
        $model->delete();

        return redirect()->to('employees');
    }

    public function getAll() {
        return Datatables::of(Employees::select()->get())
                        ->addColumn('manage', function ($giraffe) {
                            $id = $giraffe->id;
                            $isDisabled = '';
                            $html = '<div class="btn-group">
                                        <a href="/employees/show/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                                        <a href="/employees/edit/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-edit"></i></a>';

                            $html .= '<button href="/employees/delete/' . $id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';

                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage'])
                        ->make(true);
    }

    public function prepareDBquery(Request $request, Employees $model) {
        $model->name = $request->name;
        $model->position = $request->position;
        $model->phone = $request->phone ? $request->phone : '';

        return $model;
    }

}
