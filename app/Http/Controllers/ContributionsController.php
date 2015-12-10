<?php

namespace asoabo\Http\Controllers;

use asoabo\Contribution;
use asoabo\Http\Requests\ContributionEditRequest;
use asoabo\Http\Requests\ContributionViewRequest;
use asoabo\Lawyer;
use Illuminate\Http\Request;

use asoabo\Http\Requests\ContributionRequest;
use asoabo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContributionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['getView', 'postView','searchLawyer']]);
    }

    public  function  getRegister()
    {
        return view('contributions.register');
    }
    public  function  postRegister(ContributionRequest $request)
    {
        $exists = Contribution::where('lawyer_id','=',$request['lawyer_id'])->where('year','=',$request['year'])->where('month','=',$request['month'])->get();

        if($exists->count() > 0)
        {
            $errors = array(
                "0" => 'Ya existe un registro con el mismo A&#241;o-Mes'
            );
            return $request->response($errors);
        }

        $current_date = date('Y-m-d H:i:s');

        $new = new Contribution();

        $new->amount = $request['amount'];
        $new->year = $request['year'];
        $new->month = $request['month'];
        $new->date = $current_date;
        $new->description = $request['description'];
        $new->lawyer_id = $request['lawyer_id'];
        $new->user_id = Auth::user()->id;

        $new->save();

        if ($request->ajax()) {
            return response()->json([
                "mensaje" => "ok",
            ]);
        }
        return redirect()->route('contribution_register')->with('message', 'ok');
    }

    public  function getView()
    {
        return view('contributions.view');
    }

    public  function postView(ContributionViewRequest $request)
    {
        $identification = str_replace(' ', '', $request['identification']);
        $lawyers = Lawyer::where('identification','=',$identification)->get();
        if($lawyers->count() == 0) {
            $errors = array(
                "0" => 'No se encontr&#243; registro con la c&#233;dula ingresada!'
            );
            return $request->response($errors);
        }

        $contributions = Contribution::where('lawyer_id','=',$lawyers[0]->id)->where('year','=',$request['year'])->orderBy('month')->get();
        if($contributions->count() == 0) {
            $errors = array(
                "0" => 'No hay registro de pago!'
            );
            return $request->response($errors);
        }

        $lawyer = $lawyers[0];
        $month = array('enero','febrero','marzo','abril','mayo','junio','julio', 'agosto','septiembre','octubre','noviembre','diciembre');
        return view('contributions.view',compact('lawyer','contributions','month'));
    }

    public  function  searchLawyer($identification)
    {
        $identification = str_replace(' ', '', $identification);

        $lawyer = Lawyer::where('identification','=',$identification)->first();
        if($lawyer != null) {
            return response()->json($lawyer->toArray());
        }
    }

    public function getEdit($id = 0)
    {
        if($id == 0)
        {
            return \Response::view('errors.500');
        }
        $contribution = Contribution::find($id);
        $lawyer = Lawyer::find($contribution->lawyer_id);
        return view('contributions.edit',compact('contribution','lawyer'));
    }

    public function postEdit(ContributionEditRequest $request)
    {
        $contribution = Contribution::find($request['id']);

        $exists = Contribution::where('lawyer_id','=',$contribution->lawyer_id)->where('year','=',$request['year'])->where('month','=',$request['month'])->where('id','<>',$contribution->id)->get();
        if($exists->count() > 0)
        {
            $errors = array(
                "0" => 'Ya existe un registro con el mismo A&#241;o-Mes'
            );
            return $request->response($errors);
        }

        $contribution->fill($request->all());
        $contribution->save();
        return redirect()->route('contribution_view')->with('message', 'editok');
    }
}
