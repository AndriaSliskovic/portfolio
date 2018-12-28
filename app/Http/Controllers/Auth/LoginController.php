<?php

namespace App\Http\Controllers\Auth;

use App\DataTransferObject\HomeDTO;
use App\Services\ModelManager;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    private $data;
    private $instance;
    private $klasa=HomeDTO::class;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
       //dd($this->data);
    }

    public function login1(){
        return view('auth.login',
            $this->data
        );
    }
}
