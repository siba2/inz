<?php

namespace App\Http\Controllers\Tariffs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Tariffs;
use App\Customers;

class TariffsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('tariffs/index');
    }

    public function show($id) {
        $model = Tariffs::find($id);

        return view('tariffs/show')->with('model', $model);
    }

    public function create() {
        return view('tariffs/create');
    }

    public function edit($id) {
        $model = Tariffs::find($id);

        return view('tariffs/edit')->with('model', $model);
    }

    public function store(Request $request) {
        $model = $this->prepareDBquery($request, new Tariffs);
        $model->save();

        return redirect()->to('tariffs');
    }

    public function update(Request $request) {
        $model = $this->prepareDBquery($request, Tariffs::find($request->id));
        $model->save();

        return redirect()->to('tariffs');
    }

    public function delete($id) {
        $model = Tariffs::find($id);
        $model->delete();

        return redirect()->to('tariffs');
    }

    public function getAll() {
        return Datatables::of(Tariffs::select()->get())
                        ->addColumn('manage', function ($giraffe) {
                            $id = $giraffe->id;
                            $isDisabled = '';
                            $html = '<div class="btn-group">
                                        <a href="/tariffs/show/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                                        <a href="/tariffs/edit/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-edit"></i></a>';

                            $html .= '<button href="/tariffs/delete/' . $id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';

                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage'])
                        ->make(true);
    }

    public function prepareDBquery(Request $request, Tariffs $model) {
        $model->name = $request->name;
        $model->value = $request->value;

        return $model;
    }

}
