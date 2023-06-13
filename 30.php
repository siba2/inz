<?php
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