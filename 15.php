<?php

public function store(StoreCustomer $request) {
    $model = $this->prepareDBquery($request, new Customers);
    $model->save();

    return redirect()->to('customers')->with('success', trans('t_messages.content.success.add'));
}