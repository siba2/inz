<?php
    private function prepareDBquery(Request $request, Customers $model) {
        $model->name = $request->name;
        $model->lastname = $request->lastname;
        $model->email = $request->email;
        $model->zip = $request->zip;
        $model->city = $request->city;
        $model->phone = $request->phone;
        $model->address = $request->address;
        $model->info = $request->info ? $request->info : '';

        return $model;
    }