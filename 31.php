<?php
    public function store(StoreSerwersms $request) {
        try {

            $serwersms = new SMS;

            $result = $serwersms->messages->sendSms(
                    array(
                '+48' . $request->phone
                    ), $request->text, 'ETLINE', array(
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

        return redirect()->to('serwersms')->with('success', trans('t_messages.content.success.add'));
    }