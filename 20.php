<?php
    public function getAll() {
      return Datatables::of(Customers::select()->get())
                      ->addColumn('manage', function ($giraffe) {
                          $id = $giraffe->id;
                          $isUsedInTariffs = TariffsCustomer::where('id_customer', $id)->count();
                          $html = '<div class="btn-group">
                                      <a href="/customers/show/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                                      <a href="/customers/edit/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                      <a href="/customers/tariffs/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-asterisk"></i></a>
                                      <a href="/customers/cash/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-money"></i></a>
                                      <a href="/customers/iptable/' . $id . '" type="button" class="btn btn-default"><i class="fa fa-server"></i></a>';

                          if ($isUsedInTariffs) {
                              $html .= '<a href="#" type="button" class="btn btn-danger" disabled><i class="fa fa-remove"></i></a>';
                          } else {
                              $html .= '<button href="/customers/delete/' . $id . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';
                          }
                          $html .= '</div>';

                          return $html;
                      })
                      ->rawColumns(['manage'])
                      ->make(true);
  }