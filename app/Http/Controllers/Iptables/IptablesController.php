<?php

namespace App\Http\Controllers\Iptables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Iptables;
use App\IptablesClasses;

class IptablesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $classes = IptablesClasses::select()->get();

        return view('iptables/index')->with('classes', $classes);
    }

    public function createClass() {
        return view('iptables/create_class');
    }

    public function storeClass(Request $request) {

        $model = $this->classPrepareDBquery($request, new IptablesClasses);
        $model->save();

        return redirect()->to('iptables');
    }

    private function classPrepareDBquery(Request $request, IptablesClasses $model) {
        $model->class = $request->class;

        return $model;
    }

    public function deleteClass($id) {
        $model = IptablesClasses::find($id);
        $model->delete();
        
        return redirect()->to('iptables');
    }

}
