<?php

namespace asoabo\Http\Controllers;

use asoabo\User;
use Illuminate\Http\Request;

use asoabo\Http\Requests\PasswordResetRequest;

use asoabo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getReset()
    {
        return view('auth.reset_password');
    }

    public function postReset(PasswordResetRequest $request)
    {
        /*
        if($request['new_user'] == "" && $request['new_password'] == "")
        {
            return redirect()->route('user_reset');
        }
        */

        //$user = User::where('password', '=', bcrypt($request['password']))->count();
        //$password = bcrypt($request['password']);
        $user = User::where('user', '=', $request['user'])->get();
        if($user->count())
        {
            $userEdit = User::find($user[0]->id);

            if($userEdit->id != Auth::user()->id)
            {
                $errors = array(
                    "0" => "Las credenciales no coinciden con el usuario autentificado actualmente!",
                );
                return $request->response($errors);
            }

            if($request['new_user'] != "")
            {
                $userEdit->user = $request['new_user'];
            }
            if($request['new_password'] != "")
            {
                $userEdit->password = bcrypt($request['new_password']);
            }
            $userEdit->save();
            //***//
            Auth::logout();
            return redirect()->route('login')->with('message','resetok');
        }
        else {
            $errors = array(
                "0" => "Usuario no identificado",
            );
            return $request->response($errors);
        }
    }
}
