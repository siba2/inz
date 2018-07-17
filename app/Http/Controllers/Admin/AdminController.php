<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\User;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin/index');
    }

    public function show($id) {
        $model = User::find($id);

        return view('admin/show')->with('model', $model);
    }

    public function create() {
        return view('admin/create');
    }

    public function edit($id) {
        $model = User::find($id);

        return view('admin/edit')->with('model', $model);
    }

    public function store(Request $request) {
        $model = $this->prepareDBquery($request, new User);
        $model->save();

        return redirect()->to('admin');
    }

    public function update(Request $request) {
        $model = $this->prepareDBquery($request, User::find($request->id));
        $model->save();

        return redirect()->to('admin');
    }

    public function delete($id) {
        $model = User::find($id);
        $model->delete();

        return redirect()->to('admin');
    }

    public function getAll() {
        return Datatables::of(User::select()->get())
                        ->addColumn('manage', function ($giraffe) {
                            $id = $giraffe->id;
                            $html = '<div class="btn-group">
                                        <a href="/admin/show/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                                        <a href="/admin/edit/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-edit"></i></a>';

                            $html .= '<button href="/admin/delete/' . $id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';

                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage'])
                        ->make(true);
    }

    public function prepareDBquery(Request $request, User $model) {
        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->config_id = '1';

        return $model;
    }

}
