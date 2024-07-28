<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BranchSubscription;
class BranchSubsController extends Controller
{
    public function Branch_subscription(Request $request){
        //  dd($request->all());
        $branchsubscription=new BranchSubscription();
         $branchsubscription->branch_id=$request->branch_id;
         $branchsubscription->plan_id=$request->plan_id;
         $branchsubscription->save();
         toastr()->success('subscription Done Successfully');

         return redirect()->back();

        }
    }
