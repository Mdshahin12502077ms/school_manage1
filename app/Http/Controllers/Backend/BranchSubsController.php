<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BranchSubscription;
use App\Models\Branch;
use App\Models\Plan;

class BranchSubsController extends Controller
{
    public function Branch_subscription(Request $request){
        //  dd($request->all());
        $branchsubscription=new BranchSubscription();
         $branchsubscription->branch_id=$request->branch_id;
         $branchsubscription->plan_id=$request->plan_id;
         $getBranch=Branch::where('id', $branchsubscription->branch_id)->first();
         $getBranch->status='Pending';
         $getBranch->save();
         $branchsubscription->status='Pending';
         $branchsubscription->save();
         toastr()->success('subscription Done Successfully');

         return redirect()->back();

        }

        public function allSubscription(){
            $data['Allsubscription']=BranchSubscription::all();
            $data['Pendingsubscription']=BranchSubscription::where('status','Pending')->get();
            $data['Approvedsubscription']=BranchSubscription::where('status','Approved')->get();
            $data['Expiredsubscription']=BranchSubscription::where('status','Expired')->get();

            return view('Backend.admin.SchoolSubscription.AllSubscription',$data);
        }




       public function editsubscription($id){

            $data['edit_subscription'] =BranchSubscription::find($id);
            $data['branchSubs']=Branch::all();
            $data['plansubs']=Plan::all();
        return view('Backend.admin.SchoolSubscription.editSubscription',$data);
       }




       public function updateSubscription(Request $request,$id){
        $subscription=BranchSubscription::find($id);

        // $branchsubscription->branch_id=$request->branch_id;

        $subscription->plan_id=$request->plan_id;

        $subscription->status=$request->status;
        $getBranch=Branch::where('id', $subscription->branch_id)->first();
        $getBranch->status=$request->status;
        $getBranch->save();
        if ($request->status=='Approved'){


            if(isset($request->registration_id)){
                $getBranch->registration_id=$request->registration_id;
              }

            else{
                   $registration= $getBranch->id;
                            if($registration==null){
                                   $getBranch->registration_id='6521'.$getBranch->id+1;
                                 }



                                 else if($registration!=null){

                                        $getBranch->registration_id='6521'.$registration+1;

                                        }
                 }

                        $getBranch->save();




             if(isset($request->sub_reg)){
                   $subscription->subs_reg=$request->sub_reg;
                 }
                 else{
                    $subs_reg_no=$subscription->id;

                     if($subs_reg_no==null){
                    $subscription->subs_reg=$subscription->id+1;
                      }

                          else if($subs_reg_no!=null){
                           $subscription->subs_reg=$subs_reg_no+1;
                         }
                 }



             $getPlan=Plan::where('id', $subscription->plan_id)->first();

             if( $getPlan->subscription_period=='Lifetime'){
                $subscription->starting_date=date('d-m-Y',strtotime($request->starting_date));
                 $subscription->expired_date='unlimited';

             }
             else{
                $subscription->starting_date=date('d-m-Y',strtotime($request->starting_date));
                $subscription->expired_date=date('d-m-Y',strtotime($request->expired_date));

             }

        }
        $subscription->save();
        toastr()->success('Subscription Status Updated Successfully');

        return redirect()->back();
       }



       public function deletesubscription($id){
        $delSub=BranchSubscription::find($id);
        $delSub->delete();
        toastr()->success('Subscription Status Deleted Successfully');
        return redirect()->back();
       }

    }
