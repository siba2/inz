<?php

public function update(UpdateCustomer $request) {
    $model = $this->prepareDBquery($request, Customers::find($request->id));
    $model->save();

    return redirect()->to('customers')->with('success', trans('t_messages.content.success.edit'));
}