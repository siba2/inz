<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \SMS;
use App\SerwerSms;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreSerwersms;
use DB;

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
        $years = SerwerSms::select(DB::raw('YEAR(created_at) as year'))->distinct('year')->get();
        $count = SerwerSms::all()->count();

        try {

            $serwersms = new SMS;
            $r = $serwersms->account->limits();

            $limit = $r->items[1]->value;
        } catch (Exception $e) {
            $limit = '';
        }

        return view('sms/serwersms/info')
                        ->with('years', $years)
                        ->with('count', $count)
                        ->with('limit', $limit);
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

    public function infoData(Request $request) {
        $months = [trans(__('t_common.months.January')), trans(__('t_common.months.February')), trans(__('t_common.months.March')), trans(__('t_common.months.April')), trans(__('t_common.months.May')), trans(__('t_common.months.June')), trans(__('t_common.months.July')), trans(__('t_common.months.August')), trans(__('t_common.months.September')), trans(__('t_common.months.October')), trans(__('t_common.months.November')), trans(__('t_common.months.December'))];
        $arr = [];

        for ($i = 1; $i <= 12; $i++) {
            $data = SerwerSms::select('created_at')->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $request->year)->count();

            array_push($arr, $data);
        }

        return [$arr, $months];
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
