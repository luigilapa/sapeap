<?php

namespace asoabo\Http\Controllers;

use asoabo\Http\Requests\LawyerEditRequest;
use Illuminate\Http\Request;

use asoabo\Http\Requests\LawyerRequest;
use asoabo\Http\Controllers\Controller;
use asoabo\Lawyer;
use asoabo\Http\Controllers\Extend\validations;

class LawyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['getAll', 'getEdit']]);
    }

    public  function  getCreate()
    {
        return view('lawyer.create');
    }

    public  function  postCreate(LawyerRequest $request)
    {
        try
        {
            $resp = validations::validarCI($request['identification']);
            if ($resp == 'ok') {
                Lawyer::create($request->all());
                if ($request->ajax()) {
                    return response()->json([
                        "mensaje" => "ok",
                    ]);
                }
                return redirect()->route('lawyer_create')->with('message', 'ok');
            } else {
                if ($request->ajax()) {
                    return response()->json([
                        "mensaje" => $resp,
                    ]);
                }

                $errors = array(
                    "0" => $resp
                );
                return $request->response($errors);
            }
        }
        catch(\Exception $e)
        {
            if($e->getCode() == 23000) {
                if ($request->ajax()) {
                    return response()->json([
                        "mensaje" => "Est&#225;  intentado ingresas campos duplicados,  verifiqu&#233;  si  la c&#233;dula o la matricula ya existen.",
                    ]);
                }
            }
        }
    }

    public  function  getAll($num = 10)
    {
        if(!is_numeric($num)) {
            $num = 10;
        }

        if($num == 0) {
            $lawyers = Lawyer::All();
        }
        else {
            $lawyers = Lawyer::orderBy('last_name')->orderBy('first_name')->paginate($num);
        }

        return view('lawyer.list',compact('lawyers'));
    }

    public  function  getRemovedAll()
    {
        $lawyers = Lawyer::onlyTrashed()->orderBy('first_name')->orderBy('last_name')->paginate(10);
        return view('lawyer.out',compact('lawyers'));
    }

    public function getEdit($id)
    {
        $lawyer = Lawyer::find($id);
        return response()->json($lawyer->toArray());
    }

    public function postEdit(LawyerEditRequest $request, $id)
    {
        try {
            $resp = validations::validarCI($request['identification']);
            if ($resp == 'ok') {
                $lawyer = Lawyer::find($id);
                $lawyer->fill($request->all());
                $lawyer->save();
                return response()->json([
                    "mensaje" => "ok",
                ]);
            } else {
                return response()->json([
                    "mensaje" => $resp,
                ]);
            }
        }
        catch(\Exception $e)
        {
            if($e->getCode() == 23000) {
                if ($request->ajax()) {
                    return response()->json([
                        "mensaje" => "Est&#225;  intentado ingresas campos duplicados,  verifiqu&#233;  si  la c&#233;dula o la matricula ya existen.",
                    ]);
                }
            }
        }
    }


    public  function  deleteItem($id)
    {
        $lawyer = Lawyer::find($id);
        $lawyer->identification = $id;
        $lawyer->registration_number = $id;
        $lawyer->save();
        $lawyer->delete();
        return response()->json([
            "mensaje" => "ok",
        ]);
    }

    public function restoreItem(LawyerRequest $request, $id)
    {
        $resp = validations::validarCI($request['identification']);
        if($resp == 'ok') {

            $lawyer = Lawyer::withTrashed()->find($id);
            $lawyer->identification = $request['identification'];
            $lawyer->registration_number = $request['registration_number'];
            $lawyer->save();
            $lawyer->restore();
            return response()->json([
                "mensaje" => 'ok',
            ]);
        }
        else
        {
            return response()->json([
                "mensaje" => $resp,
            ]);
        }
    }
}
