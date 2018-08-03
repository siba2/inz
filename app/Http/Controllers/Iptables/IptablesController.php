<?php

namespace App\Http\Controllers\Iptables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Iptables;
use App\IptablesClasses;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreIptables;
use App\Http\Requests\StoreIptablesNode;

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

    public function store(StoreIptables $request) {

        $model = $this->prepareDBquery($request, new IptablesClasses);
        $model->save();

        return redirect()->to('iptables')->with('success', trans('t_messages.content.success.add'));
    }

    private function prepareDBquery(Request $request, IptablesClasses $model) {
        $model->class = ip2long($request->class);

        return $model;
    }

    public function delete($id) {
        $model = IptablesClasses::find($id);
        $model->delete();

        return redirect()->to('iptables')->with('success', trans('t_messages.content.success.delete'));
    }

    public function getAll() {
        return Datatables::of(IptablesClasses::select('id', 'class')->get())
                        ->editColumn('class', function($iptables) {

                            return long2ip($iptables->class);
                        })
                        ->addColumn('manage', function ($iptables) {

                            $isUsedInIptables = Iptables::where('id_iptable',$iptables->id)->count();

                            $html = '<div class="btn-group">';

                            if ($isUsedInIptables) {
                                $html .= '<a href="#" type="button" class="btn btn-danger" disabled><i class="fa fa-remove"></i></a>';
                            } else {
                                $html .= '<button href="/iptables/delete/' . $iptables->id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                            }
                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage', 'status'])
                        ->make(true);
    }

    public function node($id) {
        $model = IptablesClasses::find($id);

        return view('iptables/node/index')->with('model', $model);
    }

    public function nodeCreate($id) {
        $model = IptablesClasses::find($id);
        $ipaddr = substr(long2ip($model->class), 0, -1);

        return view('iptables/node/create')->with('model', $model)->with('ipaddr', $ipaddr);
    }

    public function nodeStore(StoreIptablesNode $request) {
        $model = $this->nodePrepareDBquery($request, new Iptables);
        $model->save();

        return redirect()->to('iptables/node/' . $request->id)->with('success', trans('t_messages.content.success.add'));
    }

    public function nodeDelete($id) {
        $model = Iptables::find($id);
        $node = $model->id_iptable;
        $model->delete();

        return redirect()->to('iptables/node/' . $node)->with('success', trans('t_messages.content.success.delete'));
    }

    public function nodeGetAll($id) {
        return Datatables::of(Iptables::select('id', 'ipaddr', 'id_customer')->where('id_iptable', $id)->get())
                        ->editColumn('ipaddr', function($iptables) {

                            return long2ip($iptables->ipaddr);
                        })
                        ->addColumn('manage', function ($iptables) {

                            $html = '<div class="btn-group">';

                            if ($iptables->id_customer != NULL) {
                                $html .= '<a href="#" type="button" class="btn btn-danger" disabled><i class="fa fa-remove"></i></a>';
                            } else {
                                $html .= '<button href="/iptables/node/delete/' . $iptables->id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                            }

                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage'])
                        ->make(true);
    }

    public function nodePrepareDBquery(Request $request, Iptables $model) {
        $model->id_iptable = $request->id;
        $model->ipaddr = ip2long($request->ipaddr);
        $model->mac = $request->mac;
        $model->comment = $request->comment;

        return $model;
    }

}
