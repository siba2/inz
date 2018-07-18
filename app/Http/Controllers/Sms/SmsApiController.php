<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SMSApi\Client;
use SMSApi\Api\SmsFactory;
use SMSApi\Exception\SmsapiException;

class SmsApiController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
       // $this->sms();

        return view('sms/smsapi/index');
    }

    public function sms() {
        require_once base_path() . '/vendor/autoload.php';

        $client = Client::createFromToken('VIrst5p7XYDX6t76hJKHYpBZNcZohBNebTd1CPHR');

        $smsapi = new SmsFactory;
        $smsapi->setClient($client);

        try {
            $actionSend = $smsapi->actionSend();

            $actionSend->setTo('506130288');
            $actionSend->setText('Hello World!!');
            $actionSend->setSender('Info');

            $response = $actionSend->execute();
        } catch (SmsapiException $exception) {
            echo 'ERROR: ' . $exception->getMessage();
        }
    }

}
