<?php
  public function delete($id) {
    $model = Customers::find($id);
    $model->delete();

    $iptables = Iptables::where('id_customer', $id)->first();

    if ($iptables) {
        $iptables->id_customer = null;
        $iptables->mac = null;
        $iptables->comment = null;
        $iptables->save();
    }

    return redirect()->to('customers')->with('success', trans('t_messages.content.success.delete'));
}