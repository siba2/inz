<?php

namespace App\Http\Controllers\Administrators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\User;
use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use Spatie\Permission\Models\Role;
use App\ModelHasRoles;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('administrators/users/index');
    }

    public function show($id) {
        $model = User::find($id);

        return view('administrators/users/show')->with('model', $model);
    }

    public function create() {
        $roles = Role::select()->get();

        return view('administrators/users/create')->with('roles', $roles);
    }

    public function store(StoreAdmin $request) {
        $model = $this->prepareDBquery($request, new User);
        $model->save();

        if ($request->roles) {
            foreach ($request->roles as $role) {
                $model->assignRole($role);
            }
        }

        return redirect()->to('administrators/users');
    }

    public function edit($id) {
        $model = User::find($id);
        $roles = Role::select()->get();
        $rolesUsedID = ModelHasRoles::where('model_id', $id)->get();
        $arr = [];
        
        foreach ($rolesUsedID as $role) {
            array_push($arr, $role->role_id);
        }

        $rolesUsed = Role::select()->whereIn('id', $arr)->get();



        return view('administrators/users/edit')
                        ->with('model', $model)
                        ->with('rolesUsed', $rolesUsed)
                        ->with('roles', $roles);
    }

    public function update(UpdateAdmin $request) {
        $model = $this->prepareDBquery($request, User::find($request->id));
        $model->save();

        ModelHasRoles::where('model_id', $request->id)->delete();

        if ($request->roles) {
            foreach ($request->roles as $role) {
                $model->assignRole($role);
            }
        }

        return redirect()->to('administrators/users');
    }

    public function delete($id) {
        $model = User::find($id);
        $model->delete();

        return redirect()->to('administrators/users');
    }

    public function getAll() {
        return Datatables::of(User::select()->get())
                        ->addColumn('manage', function ($user) {
                            $id = $user->id;
                            $html = '<div class="btn-group">
                                        <a href="/administrators/users/show/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                                        <a href="/administrators/users/edit/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-edit"></i></a>';

                            $html .= '<button href="/administrators/users/delete/' . $id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';

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
