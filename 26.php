
<?php
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