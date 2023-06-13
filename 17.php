<?php
 public function show($id) {
    $model = Customers::find($id);
    $information = Iptables::select('ipaddr', 'mac', 'comment')->where('id_customer', $id)->first();
    $ip = '';
    $mac = '';
    $comment = '';

    if (!empty($information->ipaddr)) {
        $ip = long2ip($information->ipaddr);
    }

    if (!empty($information->mac)) {
        $mac = $information->mac;
    }

    if (!empty($information->comment)) {
        $comment = $information->comment;
    }

    $tariffs = TariffsCustomer::where('id_customer', $id)->get();
    $arr = [];

    foreach ($tariffs as $tariff) {

        array_push($arr, $tariff->id_traffis);
    }


    $arrTariff = Tariffs::select('name')->whereIn('id', $arr)->get();

    return view('customers/show')
                    ->with('model', $model)
                    ->with('ip', $ip)
                    ->with('mac', $mac)
                    ->with('comment', $comment)
                    ->with('arrTariff', $arrTariff)
                    ->with('information', $information);
}