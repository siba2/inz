<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Customers;
use App\Tariffs;
use App\TariffsCustomer;
use App\IptablesClasses;
use App\Iptables;

class CustomersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('customers/index');
    }

    public function show($id) {
        $model = Customers::find($id);

        return view('customers/show')->with('model', $model);
    }

    public function create() {
        return view('customers/create');
    }

    public function edit($id) {
        $model = Customers::find($id);

        return view('customers/edit')->with('model', $model);
    }

    public function store(Request $request) {
        $model = $this->prepareDBquery($request, new Customers);
        $model->save();

        return redirect()->to('customers');
    }

    public function update(Request $request) {
        $model = $this->prepareDBquery($request, Customers::find($request->id));
        $model->save();

        return redirect()->to('customers');
    }

    public function tariffs($id) {
        $model = Customers::find($id);
        $tariffs = Tariffs::select('id', 'name')->get();
        $tariffsA = TariffsCustomer::where('id_customer', $id)->get();

        if ($tariffs->isEmpty()) {
            return redirect()->to('customers')->with('messages', trans('t_messages.customers.no_tafiffs'));
        }

        return view('customers/tariffs')->with('model', $model)->with('tariffs', $tariffs)->with('tariffsA', $tariffsA);
    }

    public function tariffsStore(Request $request) {

        TariffsCustomer::where('id_customer', $request->id)->delete();
        if ($request->tariffs) {
            foreach ($request->tariffs as $tariff) {
                $model = new TariffsCustomer;
                $model->id_customer = $request->id;
                $model->id_traffis = $tariff;
                $model->save();
            }
        }

        return redirect()->to('customers');
    }

    public function delete($id) {
        $model = Customers::find($id);
        $model->delete();

        $iptables = Iptables::where('id_customer', $id)->first();

        if ($iptables) {
            $iptables->id_customer = null;
            $iptables->mac = null;
            $iptables->comment = null;
            $iptables->save();
        }

        return redirect()->to('customers');
    }

    public function getAll() {
        return Datatables::of(Customers::select()->get())
                        ->addColumn('manage', function ($giraffe) {
                            $id = $giraffe->id;
                            $isUsedInTariffs = TariffsCustomer::where('id_customer', $id)->count();
                            $html = '<div class="btn-group">
                                        <a href="/customers/show/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                                        <a href="/customers/edit/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                        <a href="/customers/tariffs/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-asterisk"></i></a>
                                        <a href="/customers/iptable/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-server"></i></a>';

                            if ($isUsedInTariffs) {
                                $html .= '<a href="#" type="button" class="btn btn-danger" disabled><i class="fa fa-remove"></i></a>';
                            } else {
                                $html .= '<button href="/customers/delete/' . $id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                            }
                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage'])
                        ->make(true);
    }

    private function prepareDBquery(Request $request, Customers $model) {
        $model->name = $request->name;
        $model->lastname = $request->lastname;
        $model->email = $request->email;
        $model->zip = $request->zip;
        $model->city = $request->city;
        $model->phone = $request->phone;
        $model->address = $request->address;
        $model->info = $request->info ? $request->info : '';

        return $model;
    }

    public function iptable($id) {
        $classes = IptablesClasses::select()->get();
        $iptables = Iptables::where('id_customer', '=', $id)->first();
        $model = Customers::find($id);
        $usedClass = $iptables->id_iptable;
        $usedIp = long2ip($iptables->ipaddr);

        $arrClass = [];
        foreach ($classes as $class) {

            if (Iptables::where('id_iptable', $class->id)
                            ->where(function ($query) use ($id) {
                                $query->where('id_customer', '=', NULL)
                                ->orWhere('id_customer', '=', $id);
                            })->count()) {
                $arrClass[$class->id] = long2ip($class->class);
            }
        }

        if (count($arrClass) == 0) {
            return redirect()->to('customers');
        }

        return view('customers/iptable')
                        ->with('model', $model)
                        ->with('arrClass', $arrClass)
                        ->with('iptables', $iptables)
                        ->with('usedClass', $usedClass)
                        ->with('usedIp', $usedIp);
    }

    public function iptableStore(Request $request) {
        $oldModel = Iptables::where('id_customer', $request->id)->first();

        if ($oldModel) {
            $oldModel->id_customer = null;
            $oldModel->mac = null;
            $oldModel->comment = null;
            $oldModel->save();
        }

        $model = Iptables::where('ipaddr', ip2long($request->ipaddr))->first();
        $model->id_customer = $request->id;
        $model->mac = $request->mac;
        $model->comment = $request->comment;
        $model->save();

        return redirect()->to('customers');
    }

    public function listIp(Request $request) {
        $listIp = Iptables::select('ipaddr')->where('id_iptable', $request->ip)
                        ->where(function ($query) use ($request) {
                            $query->where('id_customer', '=', NULL)
                            ->orWhere('id_customer', '=', $request->idCustomer);
                        })->get();

        $arr = [];
        foreach ($listIp as $ip) {
            array_push($arr, long2ip($ip->ipaddr));
        }

        return $arr;
    }

}
