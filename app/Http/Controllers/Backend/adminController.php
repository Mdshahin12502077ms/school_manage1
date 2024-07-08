<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard(){
        return view('Backend.admin.include.index');
    }

 
}
