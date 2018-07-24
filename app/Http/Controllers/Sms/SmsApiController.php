<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SMSApi\Client;
use SMSApi\Api\SmsFactory;
use SMSApi\Exception\SmsapiException;
use App\Http\Requests\StoreSmsApi;
use App\SmsApi;
use Yajra\Datatables\Datatables;

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
        return view('sms/smsapi/info');
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
                            
                            
                            
                            return '';
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
