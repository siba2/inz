<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SMSApi\Client;
use SMSApi\Api\SmsFactory;
use SMSApi\Api\UserFactory;
use SMSApi\Exception\SmsapiException;
use App\Http\Requests\StoreSmsApi;
use App\SmsApi;
use Yajra\Datatables\Datatables;
use DB;

class SmsApiController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        require_once base_path() . '/vendor/autoload.php';
    }

    public function index() {
        return view('sms/smsapi/index');
    }

    public function create() {
        return view('sms/smsapi/create');
    }

    public function info() {
        $client = Client::createFromToken(env('SMSAPI_TOKEN'));
        $years = SmsApi::select(DB::raw('YEAR(created_at) as year'))->distinct('year')->get();
        $count = SmsApi::all()->count();

        $smsapi = new UserFactory;
        $smsapi->setClient($client);

        try {
            $points = $smsapi->actionGetPoints()->execute()->getPoints();
        } catch (SmsapiException $exception) {
            $points = '';
        }

        return view('sms/smsapi/info')
                        ->with('points', $points)
                        ->with('count', $count)
                        ->with('years', $years);
    }

    public function infoData(Request $request) {
        $months = [trans(__('t_common.months.January')), trans(__('t_common.months.February')), trans(__('t_common.months.March')), trans(__('t_common.months.April')), trans(__('t_common.months.May')), trans(__('t_common.months.June')), trans(__('t_common.months.July')), trans(__('t_common.months.August')), trans(__('t_common.months.September')), trans(__('t_common.months.October')), trans(__('t_common.months.November')), trans(__('t_common.months.December'))];
        $arr = [];


        for ($i = 1; $i <= 12; $i++) {
            $data = SmsApi::select('created_at')->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $request->year)->count();

            array_push($arr, $data);
        }

        return [$arr, $months];
    }

    public function store(StoreSmsApi $request) {

        $client = Client::createFromToken(env('SMSAPI_TOKEN'));

        $smsapi = new SmsFactory;
        $smsapi->setClient($client);

        try {
            $actionSend = $smsapi->actionSend();

            $actionSend->setTo($request->phone);
            $actionSend->setText($request->text);
            $actionSend->setSender('Info');

            $response = $actionSend->execute();

            foreach ($response->getList() as $status) {

                $model = new SmsApi;
                $model->sms_id = $status->getId();
                $model->phone = $status->getNumber();
                $model->text = $request->text;               
                $model->save();
            }
        } catch (SmsapiException $exception) {
            echo 'ERROR: ' . $exception->getMessage();
        }

        return redirect()->to('smsapi');
    }

    public function delete($id) {
        $model = SmsApi::find($id);
        $model->delete();

        return redirect()->to('smsapi');
    }

    public function getAll() {
        return Datatables::of(SmsApi::select('id', 'sms_id', 'phone', 'text')->get())
                        ->addColumn('status', function ($sms) {

                            $client = Client::createFromToken(env('SMSAPI_TOKEN'));

                            $smsapi = new SmsFactory;
                            $smsapi->setClient($client);

                            try {
                                $actionSend = $smsapi->actionGet($sms->sms_id);

                                $response = $actionSend->execute();

                                foreach ($response->getList() as $status) {


                                    $html = $status->getStatus();
                                }
                            } catch (SmsapiException $exception) {
                                $html = 'ERROR: ' . $exception->getMessage();
                            }

                            return $html;
                        })
                        ->addColumn('manage', function ($sms) {
                            $html = '<div class="btn-group">';
                            $html .= '<button href="/smsapi/delete/' . $sms->id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage', 'status'])
                        ->make(true);
    }

}
