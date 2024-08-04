<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function loginCheck(Request $request){
          $email=$request->email;
          $password=$request->password;
          if(Auth::attempt(['email' => $email, 'password' => $password])){

                  if(Auth::user()){


                        return redirect('admin/dashboard');
                  
                  }

                  else{
                    Auth::logout();
                  }
    }
}

public function login(){
    return view('auth.login');
}

public function logout(){
    dd('logout');
    Auth::logout();
    return redirect('admin/login');
}

}
