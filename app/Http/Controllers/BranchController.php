<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Branch;

use App\Models\BranchDetails;

class BranchController extends Controller
{

public function all(){
    $branches=Branch::with('division','district','branch_details')->get();
    return view('Backend.admin.Branch.all_branch',compact('branches'));
}










    //Add branch
    Public function Branch_add(){

        $get_division=Division::get();
        return view('Backend.admin.Branch.Add_branch',compact('get_division'));
    }
   public function insert(Request $request){
     $branch=new Branch();
     $branch->institute_name=$request->institute_name;
     $branch->division_id=$request->division_id;
     $branch->district_id=$request->district_id;
     $branch->sub_district=$request->sub_district;
     $branch->thana=$request->thana;
     $branch->post_office=$request->post_office;
     $branch->address=$request->address;
     $branch->post_code=$request->post_code;

     if($branch->registration_id==null){
       $branch->registration_id='6521'.$branch->registration_id+1;
     }



     $branch->Propietor_Name=$request->Propietor_Name;
     $branch->save();
     $branch->update(
        ['registration_id' => $branch->registration_id + 1],
     ) ;
     //branch details
     $branch_dtls=new BranchDetails();
     $branch_dtls->branch_id=$branch->id;
     $branch_dtls->fathers_name=$request->fathers_name;
     $branch_dtls->mothers_name=$request->mothers_name;
     $branch_dtls->institute_age=$request->institute_age;
     $branch_dtls->no_computer=$request->no_computer;
     $branch_dtls->e_mail=$request->e_mail;
     $branch_dtls->mobile_number=$request->mobile_number;
     $branch_dtls->additional_rel_name=$request->additional_rel_name;
     $branch_dtls->blood_group=$request->blood_group;
     $branch_dtls->extra_rel_contact=$request->extra_rel_contact;
     $branch_dtls->additional_mobile_no=$request->additional_mobile_no;
     if(isset($request->ceo_profile)){
        $file=$request->file('ceo_profile');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->ceo_profile=$path .$filename;
     }

     if(isset($request->national_id)){
        $file=$request->file('national_id');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->national_id=$path .$filename;
     }

     if(isset($request->educational_skill)){
        $file=$request->file('educational_skill');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->educational_skill=$path .$filename;
     }
     if(isset($request->institute_image)){
        $file=$request->file('institute_image');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->institute_image=$path .$filename;
     }

     if(isset($request->trade_licence)){
        $file=$request->file('trade_licence');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->trade_licence=$path .$filename;
     }
    if(isset($request->extra_file))
    {
      $image =[];
      foreach($request->extra_file as $file){
       $filename=time().'.'.$file->getClientOriginalExtension();
       $path="Backend/image/Branch/";
       $file->move($path,$filename);
       $image[] = $path .$filename;
      }
     $branch_dtls->extra_file= json_encode($image);
 }
     $branch_dtls->ceo_facebook=$request->ceo_facebook;
     $branch_dtls->save();

     toastr()->success('Information saved successfully');
     return redirect()->back();

   }

 }
