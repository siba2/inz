<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerwersmsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $this->sendSMStest();
        // $this->responseSMS();

        return view('sms/serwersms/index');
    }

    private function sendSMStest() {
        try {

            $serwersms = new \SMS;

            $result = $serwersms->messages->sendSms(
                    array(
                '+48506130288', '506130288'
                    ), 'asd', 'TEST', array(
                'test' => true,
                'details' => true,
                    )
            );

            echo 'Skolejkowano: ' . $result->queued . '<br />';
            echo 'Niewysłano: ' . $result->unsent . '<br />';

            foreach ($result->items as $sms) {

                echo 'ID: ' . $sms->id . '<br />';
                echo 'NUMER: ' . $sms->phone . '<br />';
                echo 'STATUS: ' . $sms->status . '<br />';
                echo 'CZĘŚCI: ' . $sms->parts . '<br />';
                echo 'WIADOMOŚĆ: ' . $sms->text . '<br />';
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    private function responseSMS() {
        try {

            $serwersms = new \SMS;

            // Get messages reports
            $result = $serwersms->messages->reports(array('id' => array('ef4563d876')));

            foreach ($result->items as $sms) {

                echo 'ID: ' . $sms->id . '<br />';
                echo 'NUMER: ' . $sms->phone . '<br />';
                echo 'STATUS: ' . $sms->status . '<br />';
                echo 'SKOLEJKOWANO: ' . $sms->queued . '<br />';
                echo 'WYSŁANO: ' . $sms->sent . '<br />';
                echo 'DORĘCZONO: ' . $sms->delivered . '<br />';
                echo 'NADAWCA: ' . $sms->sender . '<br />';
                echo 'TYP: ' . $sms->type . '<br />';
                echo 'WIADOMOŚĆ: ' . $sms->text . '<br />';
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
