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
}
,,,