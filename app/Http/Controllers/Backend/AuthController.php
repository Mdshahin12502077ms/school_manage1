<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function loginCheck(Request $request){
             $request->validate([
                // 'registration_id'=>'required',
                'email'=>'required',
                'password'=>'required',
             ]);
          $email=$request->email;
          $password=$request->password;
          $registration_id=$request->registration_id;


        $registration=Branch::where('registration_id',$request->registration_id)->first();
    

     if( $registration_id!=null){
    if(Auth::attempt(['email' => $email, 'password' => $password]) && Auth::user()->branch_id==$registration->id){
        if(Auth::user()){

              return redirect('admin/dashboard');

        }
     }
  }


    if(Auth::attempt(['email' => $email, 'password' => $password]) && Auth::user()->admin_role=='superadmin'){
        if(Auth::user()){

            return redirect('admin/dashboard');

      }
    }

    else{
        Auth::logout();
        toastr()->warning('Your Credential Does not Match please insert registration no ');
        return redirect('Login/log');
      }
}

public function login(){
    return view('auth.login');
}

public function logout(){
   // Auth::guard('admin')->logout();  //admin guard
    Auth::logout();
    return redirect('Login/log');
}

}
