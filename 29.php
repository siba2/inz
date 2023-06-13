<?php
    public function infoData(Request $request) {
        $months = [trans(__('t_common.months.January')), trans(__('t_common.months.February')), trans(__('t_common.months.March')), trans(__('t_common.months.April')), trans(__('t_common.months.May')), trans(__('t_common.months.June')), trans(__('t_common.months.July')), trans(__('t_common.months.August')), trans(__('t_common.months.September')), trans(__('t_common.months.October')), trans(__('t_common.months.November')), trans(__('t_common.months.December'))];
        $arr = [];


        for ($i = 1; $i <= 12; $i++) {
            $data = SmsApi::select('created_at')->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $request->year)->count();

            array_push($arr, $data);
        }

        return [$arr, $months];
    }