<?php

namespace App\Http\Controllers\Iptables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Iptables;
use App\IptablesClasses;
use Yajra\Datatables\Datatables;

class IptablesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('iptables/index');
    }

    public function create() {
        return view('iptables/create');
    }

    public function store(Request $request) {

        $model = $this->prepareDBquery($request, new IptablesClasses);
        $model->save();

        return redirect()->to('iptables');
    }

    private function prepareDBquery(Request $request, IptablesClasses $model) {
        $model->class = ip2long($request->class);

        return $model;
    }

    public function delete($id) {
        $model = IptablesClasses::find($id);
        $model->delete();

        return redirect()->to('iptables');
    }

    public function getAll() {
        return Datatables::of(IptablesClasses::select('id', 'class')->get())
                        ->addColumn('manage', function ($iptables) {
                            $html = '<div class="btn-group">';
                            $html .= '<button href="/iptables/delete/' . $iptables->id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage', 'status'])
                        ->make(true);
    }

    public function node($id) {
        return view('iptables/node/index')->with('node_id', $id);
    }

    public function nodeCreate($id) {
        return view('iptables/node/create')->with('id', $id);
    }

    public function nodeGetAll($id) {
        return Datatables::of(Iptables::select('id', 'ipaddr')->where('id_iptable', $id)->get())
                        ->addColumn('manage', function ($iptables) {
                            $html = '<div class="btn-group">';

                            $html .= '<button href="/iptables/delete/' . $iptables->id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage'])
                        ->make(true);
    }

    public function nodeStore(Request $request) {
        $model = $this->nodePrepareDBquery($request, new Iptables);
        $model->save();

        return redirect()->to('iptables/node/' . $request->id);
    }

    public function nodePrepareDBquery(Request $request, Iptables $model) {
        $model->id_iptable = $request->id;
        $model->ipaddr = ip2long($request->ipaddr);
        $model->mac = $request->mac;
        $model->comment = $request->comment;

        return $model;
    }

}
