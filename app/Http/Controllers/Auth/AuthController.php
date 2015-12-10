<?php

namespace asoabo\Http\Controllers\Auth;

use asoabo\Http\Requests\EditUserRequest;
use asoabo\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Validator;
use asoabo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    protected $redirectTo = '/';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'getLogin']);
        //$this->middleware('admin', ['only' => ['getRegister','getEdit']]);
        $this->middleware('admin', ['except' => ['getLogin','postLogin','getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'email',
            'user' => 'required|max:255',
            'type' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'user' => $data['user'],
            'type' => $data['type'],
            'password' => bcrypt($data['password']),
        ]);
    }

     /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return route('login');
    }
    
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
       return route('home'); 
    }

    public function getListUsers()
    {
        $users = User::where('active','=','1')->orderBy('type')->orderBy('last_name')->orderBy('first_name')->paginate(10);

        return view('auth.listusers', compact('users'));
    }

    public  function getOutUser()
    {
        $users = User::where('active','=','0')->orderBy('type')->orderBy('last_name')->orderBy('first_name')->paginate(10);

        return view('auth.outusers', compact('users'));
    }

    public function getEdit($id=0)
    {
        if($id == 0)
        {
            return \Response::view('errors.500');
        }
        $user = User::find($id);
        return view('auth.edituser', compact('user'));
    }

    public function postEdit(EditUserRequest $request)
    {
        $user = User::find($request['id']);
        $user->fill($request->all());
        $user->save();
        return redirect()->route('user_list')->with('message', 'editok');
    }

    public function postCancel($id)
    {
        $user = User::find($id);
        if( $user->id == Auth::user()->id)
        {
            return response()->json([
                "mensaje" => "login",
            ]);
        }
        $user->active = false;
        $user->save();

        return response()->json([
            "mensaje" => "ok",
        ]);
    }

    public function postRestart($id)
    {
        $user = User::find($id);
        $user->active = true;
        $user->save();

        return response()->json([
            "mensaje" => "ok",
        ]);
    }

}
