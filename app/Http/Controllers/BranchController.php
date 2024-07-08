<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class BranchController extends Controller
{
    Public function Branch_add(){

        $get_division=Division::get();
        return view('Backend.admin.Branch.Add_branch',compact('get_division'));
    }


}
