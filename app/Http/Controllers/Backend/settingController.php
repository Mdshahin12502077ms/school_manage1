<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
class settingController extends Controller
{
    Public function division_add(){
        $get_division=Division::all();
        return view('Backend.admin.settings.Add_division',compact('get_division'));
    }

    public function division_insert(Request $request){
        // $request->validate([
        //     'name'=> 'required|unique',
        //   ]);
        $division= new Division();
        $division->name=$request->name;
        $division->save();
        toastr()->success('Add Division Successfully');
        return redirect()->back();
    }
    Public function division_edit($id){
        $get_division=Division::find($id);
        return view('Backend.admin.settings.division_edit',compact('get_division'));
    }

    public function update_division(Request $request, $id){
        $get_division=Division::find($id);

        $get_division->name=$request->name;
        $get_division->save();
        toastr()->success('Update Division Successfully');
        return redirect('add_division');
    }

    public function Delete_division($id){
        $delete=Division::find($id);
        $delete->delete();
        toastr()->success('Delete Division Successfully');
        return redirect('add_division');
    }

    public function add_district(){
       $get_division=Division::get();
       $get_all=District::with('division')->get();

        return view('Backend.admin.settings.Add_District',compact('get_division','get_all'));
    }

    public function district_insert(Request $request){
        $district = new District();

        $district->district_name=$request->district_name;

        $district->division_id=$request->division_id;
        $district->save();
        toastr()->success('Add  District Successfully');
        return redirect()->back();
    }

    public function district_edit($id){

        $get_district=District::find($id);
        $get_division=Division::get();


         return view('Backend.admin.settings.edit_district',compact('get_division','get_district'));
     }

     public function update_district($id ,Request $request){
        $get_district=District::find($id);

        $get_district->district_name=$request->district_name;

        $get_district->division_id=$request->division_id;
        $get_district->save();
        toastr()->success('Update District Successfully');
        return redirect('add_district');
     }

     public function delete_district($id){
        $delete=District::find($id);
        $delete->delete();
        toastr()->success('Delete District Successfully');
        return redirect('add_district');
     }

     public function getDistrictByDivision(Request $request){
        $district_name='';
         $district= District::where('division_id',$request->division_id)->get();
         foreach( $district as $district){
            $district_name.="<option value='".$district->id."'>".$district->district_name."</option> ";
         }
         echo  $district_name;
      
     }


     public function getDistrict(Request $request){
       echo('hello');
     }
}
