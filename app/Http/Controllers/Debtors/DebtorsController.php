<?php

namespace App\Http\Controllers\Debtors;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customers;
use Yajra\Datatables\Datatables;

class DebtorsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('debtors/index');
    }

    public function getAll() {
        return Datatables::of(Customers::select('customers.name', 'customers.lastname', DB::raw('SUM(value) AS balance'))
                                ->join('cash', 'customers.id', '=', 'cash.id_customer')
                                ->groupby('customers.id')
                                ->get())
                        ->editColumn('balance', function($posts) {
                            $style = '';
                            if ($posts->balance < 0) {
                                $style = '<b style="color: red;">';
                            } elseif ($posts->balance > 0) {
                                $style = '<b style="color: green;">';
                            }

                            return $style . $posts->balance . '</b>';
                        })
                        ->rawColumns(['balance'])
                        ->make(true);
    }

}
