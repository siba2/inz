<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SmsApiController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        /*  function sms_send($params, $backup = false) {

          static $content;

          if ($backup == true) {
          $url = 'https://api2.smsapi.pl/sms.do';
          } else {
          $url = 'https://api.smsapi.pl/sms.do';
          }

          $c = curl_init();
          curl_setopt($c, CURLOPT_URL, $url);
          curl_setopt($c, CURLOPT_POST, true);
          curl_setopt($c, CURLOPT_POSTFIELDS, $params);
          curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

          $content = curl_exec($c);
          $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

          if ($http_status != 200 && $backup == false) {
          $backup = true;
          sms_send($params, $backup);
          }

          curl_close($c);
          return $content;
          }

          $params = array(
          'username' => 'sibastian2@gmail.com',
          'password' => 'd45624758644bf84b5a829518b12e9c3',
          'to' => '506130288',
          'from' => 'Info',
          'message' => "Hello world!",
          );

          echo sms_send($params);
         */
     

        return view('sms/smsapi/index');
    }

}
