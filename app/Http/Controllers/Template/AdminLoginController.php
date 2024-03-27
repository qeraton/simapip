<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('Template.AdminLogin');
    }
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email|string',
            'password' => 'required|min:6'
        ]);
        
        if($validate->fails())
        {
            return redirect('/load-login')->with('message', $validate->errors());
        }

        $adminCredential = array('admin@gmail.com',123456);
        $email = $request->email;
        $password = $request->password;

        if($email== $adminCredential[0] && $password==$adminCredential[1]){
           return redirect()->to('/');
        }
        else{
            return redirect('/load-login')->with('message', 'Your Email and Password does not match!');
        }

    }
}
