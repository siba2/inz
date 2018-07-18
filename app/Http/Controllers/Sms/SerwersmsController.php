<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \SMS;
use App\SerwerSms;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreSerwersms;

class SerwersmsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('sms/serwersms/index');
    }

    public function create() {
        return view('sms/serwersms/create');
    }

    public function info() {
        return view('sms/serwersms/info');
    }

    public function store(StoreSerwersms $request) {
        try {

            $serwersms = new SMS;

            $result = $serwersms->messages->sendSms(
                    array(
                '+48' . $request->phone
                    ), $request->text, 'TEST', array(
                'details' => true,
                    )
            );

            foreach ($result->items as $sms) {

                $model = new SerwerSms;
                $model->sms_id = $sms->id;
                $model->phone = $sms->phone;
                $model->text = $sms->text;
                $model->save();
            }
        } catch (Exception $e) {
            return redirect()->to('serwersms');
        }

        return redirect()->to('serwersms');
    }

    public function delete($id) {
        $model = SerwerSms::find($id);
        $model->delete();

        return redirect()->to('serwersms');
    }

    public function getAll() {
        return Datatables::of(SerwerSms::select('id', 'sms_id', 'phone', 'text')->get())
                        ->addColumn('status', function ($sms) {
                            try {

                                $serwersms = new \SMS;
                                $result = $serwersms->messages->reports(array('id' => array($sms->sms_id)));

                                foreach ($result->items as $sms) {

                                    return $sms->status;
                                }
                            } catch (Exception $e) {
                                return '';
                            }
                        })
                        ->addColumn('manage', function ($sms) {
                            $html = '<div class="btn-group">';
                            $html .= '<button href="/serwersms/delete/' . $sms->id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage', 'status'])
                        ->make(true);
    }

}
