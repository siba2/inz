<?php

namespace App\Http\Controllers\Administrators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
use App\RoleHasPermissions;
use App\Http\Requests\StoreRoles;
use App\Http\Requests\UpdateRoles;

class RolesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('administrators/roles/index');
    }

    public function show($id) {
        $model = Role::find($id);
        $permissionsIDs = $this->roleHasPermissions($id);
        $permissions = Permission::whereIn('id', $permissionsIDs)->get();     

        return view('administrators/roles/show')->with('model', $model)->with('permissions', $permissions);
    }

    public function create() {
        $permissions = Permission::select('id', 'name')->get();

        return view('administrators/roles/create')->with('permissions', $permissions);
    }

    public function store(StoreRoles $request) {
        $model = $this->prepareDBquery($request, new Role);
        $model->save();

        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                $model->givePermissionTo($permission);
            }
        }

        return redirect()->to('administrators/roles')->with('success', trans('t_messages.content.success.add'));
    }

    public function edit($id) {
        $model = Role::find($id);
        $permissionsIDs = $this->roleHasPermissions($id);
        $permissionsUsed = Permission::whereIn('id', $permissionsIDs)->get();
        $permissions = Permission::select('id', 'name')->get();

        return view('administrators/roles/edit')
                        ->with('model', $model)
                        ->with('permissions', $permissions)
                        ->with('permissionsUsed', $permissionsUsed);
    }

    public function update(UpdateRoles $request) {
        $model = $this->prepareDBquery($request, Role::find($request->id));
        $model->save();

        RoleHasPermissions::where('role_id', $request->id)->delete();

        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                $model->givePermissionTo($permission);
            }
        }

        return redirect()->to('administrators/roles')->with('success', trans('t_messages.content.success.edit'));
    }

    public function delete($id) {
        RoleHasPermissions::where('role_id', $id)->delete();

        $model = Role::find($id);
        $model->delete();

        return redirect()->to('administrators/roles')->with('success', trans('t_messages.content.success.delete'));
    }

    public function getAll() {
        return Datatables::of(Role::select()->get())
                        ->addColumn('permissions', function ($role) {
                            $html = '';
                            $permissions = Permission::select('name')->whereIn('id', $this->roleHasPermissions($role->id))->get();

                            foreach ($permissions as $key => $permission) {
                                if ($key == 0) {
                                    $html .= $permission->name;
                                } else {
                                    $html .= ', ' . $permission->name;
                                }
                            }
                            return $html;
                        })
                        ->addColumn('manage', function ($role) {
                            $id = $role->id;
                            $html = '<div class="btn-group">
                                        <a href="/administrators/roles/show/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                                        <a href="/administrators/roles/edit/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-edit"></i></a>';

                            $html .= '<button href="/administrators/roles/delete/' . $id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';

                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage', 'permissions'])
                        ->make(true);
    }

    private function prepareDBquery(Request $request, Role $model) {
        $model->name = $request->name;
        $model->guard_name = 'web';

        return $model;
    }

    private function roleHasPermissions($roleID) {
        $arr = [];
        $roleHasPermissions = RoleHasPermissions::select('permission_id')->where('role_id', $roleID)->get();

        foreach ($roleHasPermissions as $permission) {
            array_push($arr, $permission->permission_id);
        }

        return $arr;
    }

}
