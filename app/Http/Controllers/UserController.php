<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function signIn(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required'
        ]);
        $message = 'اسم المستخدم أو كلمة المرور غير صحيحة';
        if(Auth::attempt(['username'=>$request['username'],'password'=>$request['password']]))
        {
            return redirect()->route('dashboard');
        }
        else{
            return redirect('home')->with('message',$message);
        }
    }
}
