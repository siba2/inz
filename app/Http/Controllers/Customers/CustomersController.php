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
use App\Cash;
use DB;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Http\Requests\StoreCash;

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

    public function store(StoreCustomer $request) {
        $model = $this->prepareDBquery($request, new Customers);
        $model->save();

        return redirect()->to('customers');
    }

    public function update(UpdateCustomer $request) {
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
                                        <a href="/customers/cash/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-money"></i></a>
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
        $iptables = Iptables::where('id_customer', '=', $id);
        $model = Customers::find($id);
        $usedClass = '';
        $usedIp = '';

        if ($iptables->count()) {
            $usedClass = $iptables->first()->id_iptable;
        }
        if ($iptables->count()) {
            $usedIp = long2ip($iptables->first()->ipaddr);
        }

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
                        ->with('iptables', $iptables->first())
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

    public function cash($id) {
        $model = Customers::find($id);
        $cash = Cash::where('id_customer', $id)->get();

        return view('customers/cash/index')->with('model', $model)->with('cash', $cash);
    }

    public function cashCreate($id) {
        $model = Customers::find($id);
        $tariffs = Tariffs::select()->get();

        return view('customers/cash/create')->with('model', $model)->with('tariffs', $tariffs);
    }

    public function cashStore(StoreCash $request) {
        $model = Customers::find($request->id);
        $cash = Cash::where('id_customer', $request->id)->get();

        $newCash = $this->cashPrepareDBquery($request, new Cash);
        $newCash->save();

        return redirect('customers/cash/' . $request->id)->with('model', $model)->with('cash', $cash);
    }

    public function cashGetAll($id) {
        return Datatables::of(Cash::select()->where('id_customer', $id)->get())
                        ->editColumn('id_tariff', function($cash) {

                            if ($cash->id_tariff == null) {
                                return $cash->comment;
                            } else {
                                return Tariffs::find($cash->id_tariff)->name;
                            }
                        })
                        ->editColumn('value', function($cash) {

                            if ($cash->value > 0) {
                                $html = '<b style="color: green;">+' . $cash->value . '</b>';
                            } else {
                                $html = '<b style="color: red;">' . $cash->value . '</b>';
                            }

                            return $html;
                        })
                        ->addColumn('balance', function($cash) {

                            $balance = Cash::select(DB::raw('SUM(value) AS balance'))
                                    ->where('id_customer', $cash->id_customer)
                                    ->where('date', '<=', $cash->date)
                                    ->first()->balance;

                            if ($balance > 0) {
                                $html = '<b style="color: green;">+' . $balance . '</b>';
                            } else {
                                $html = '<b style="color: red;">' . $balance . '</b>';
                            }

                            return $html;
                        })
                        ->rawColumns(['balance', 'value'])
                        ->make(true);
    }

    private function cashPrepareDBquery(Request $request, Cash $model) {
        $model->id_customer = $request->id;

        $model->date = date('y-m-d h:m:s');

        if ($request->manualTariff == 'on') {
            $model->comment = $request->name;
            $model->value = $request->value;
        } else {
            $model->id_tariff = $request->tariff;
            $model->value = Tariffs::find($request->tariff)->value;
            $model->comment = null;
        }

        return $model;
    }

}
