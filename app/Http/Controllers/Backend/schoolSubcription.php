<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class schoolSubcription extends Controller
{
    public function all(){
    //    $data['allPlan']=
        return view('Backend.admin.SchhoolSubscription.Allplan');
    }
}
