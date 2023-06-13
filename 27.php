
<?php
    public function store(StoreSmsApi $request) {

        $client = Client::createFromToken(env('SMSAPI_TOKEN'));

        $smsapi = new SmsFactory;
        $smsapi->setClient($client);

        try {
            $actionSend = $smsapi->actionSend();

            $actionSend->setTo($request->phone);
            $actionSend->setText($request->text);
            $actionSend->setSender('ETLINE');

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

        return redirect()->to('smsapi')->with('success', trans('t_messages.content.success.add'));
    }