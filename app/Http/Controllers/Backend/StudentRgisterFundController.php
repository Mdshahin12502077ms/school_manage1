<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentRgisterFundController extends Controller
{
    public function add_fund(){
       
        return view('Backend.admin.Registration.AddFund');
    }
}
