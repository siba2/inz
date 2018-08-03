<?php

namespace App\Http\Controllers\Documents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class DocumentsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('documents/index');
    }

    public function create() {
        return view('documents/create');
    }

    public function store(Request $request) {
        if ($request->file('data')) {
            if (!file_exists('_documents')) {

                mkdir('_documents');
            }
            $data = $request->file('data');
            $data->move('_documents/' , $request->file("data")->getClientOriginalName());
        }

        return redirect()->to('documents')->with('success', trans('t_messages.content.success.add'));
    }

    public function delete($name) {
        File::delete('_documents/' . $name);

        return redirect()->to('documents')->with('success', trans('t_messages.content.success.delete'));
    }

    public function download($name) {

        $file = file_get_contents ('_documents/' . $name);

        header('Content-Disposition: attachment;filename=' . $name);
        header('Content-Type: text/plain');

        return $file;
    }

    public function getAll() {

        $files = scandir('_documents/');

        $model = new Collection;

        foreach ($files as $file) {

            if ($file != '.' && $file != '..') {
                $model->push([
                    'name' => $file,
                    'manage' => '',
                ]);
            }
        }
        return Datatables::of($model)
                        ->editColumn('manage', function ($model) {

                            $html = '<div class="btn-group">
                                        <a href="/documents/download/' . $model['name'] . '" type="button" class="btn btn-default"><i class="fa fa-download"></i></a>';

                            $html .= '<button href="/documents/delete/' . $model['name'] . '" type="button" class="btn btn-danger" onClick="modalConfirm($(this).attr(\'href\'))"><i class="fa fa-remove"></i></button>';

                            $html .= '</div>';

                            return $html;
                        })
                        ->rawColumns(['manage'])
                        ->make(true);
    }

}
