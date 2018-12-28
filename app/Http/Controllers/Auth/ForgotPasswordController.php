<?php

namespace App\Http\Controllers\Auth;

use App\DataTransferObject\HomeDTO;
use App\Services\ModelManager;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    private $data;
    private $instance;
    private $klasa=HomeDTO::class;

    public function __construct(Request $request)
    {
        $this->middleware('guest');
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
        // dd($this->data);
    }

    public function forgot(){
        return view('auth.passwords.email',
            $this->data
        );
    }

}
