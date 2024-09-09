<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\EducationYear;
use App\Models\BackendSettings;

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


    public function addEducationYear(){
    $eduYear=EducationYear::all();
    return view('Backend.admin.settings.EducationAdd',compact('eduYear'));

   }

  public function insertEducationYear(Request $request){
    $eduYear=new EducationYear();
    $eduYear->education_year=$request->education_year;
    $eduYear->status='Pending';
    $eduYear->save();
    toastr()->success('Add Education Year Successfully');
    return redirect()->back();
  }

  public function editEducationYear($id){
    $data['editEduYear']=EducationYear::find($id);
    return view('Backend.admin.settings.EducationYearEdit',$data);
  }

  public function updateEducationYear(Request $request, $id){
    $eduYear=EducationYear::find($id);
    if($eduYear->status=='Active'){
        $eduYear->status='Deactive';
        $eduYear->save();
        toastr()->success('Deactive Education Year Successfully');
        return redirect()->back();
    }
    elseif($eduYear->status=='Deactive'||$eduYear->status=='Pending'){
        $eduYear->status='Active';
        $eduYear->save();
        toastr()->success('Active Education Year Successfully');
        return redirect()->back();
    }

  }

  public function deleteEducationYear($id){
    $eduYear=EducationYear::find($id);
    $eduYear->delete();
    toastr()->success('Delete Education Year Successfully');
    return redirect()->back();
  }

  public function BackendEdit(){

    $data['getBackend']=BackendSettings::where('id',1)->first();
    return view('Backend.admin.settings.edit_backend',$data);
  }

  public function BackendUpdate(Request $request,$id){
    $backend=BackendSettings::find($id);
    $backend->institute_name=$request->name;
    $backend->starting_year=$request->starting_year;

    $backend->site_title=$request->site_title;
    $backend->sub_title=$request->sub_title;
    $backend->address=$request->address;
    $backend->phone=$request->phone;
    $backend->email=$request->email;
    $backend->meta_title=$request->meta_title;
    $backend->meta_description=$request->meta_description;
    $backend->meta_keywords=$request->meta_keywords;

    $backend->facebook=$request->facebook;
    $backend->twitter=$request->twitter;
    $backend->linkedin=$request->linkedin;
    // dd($request->instragram);
    $backend->instragram=$request->instragram;
    $backend->footer=$request->footer;

    if(isset($request->logo)){

        if($backend->logo && file_exists($backend->logo)){
            unlink($backend->logo);
        }

        $file = $request->file('logo');
        $extension = 'logo'.$file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'Backend/image/BackendSetting/';
        $file->move($path, $filename);
        $backend->logo = $path . $filename;
        }


    if(isset($request->favicon)){

        if($backend->favicon && file_exists($backend->favicon)){
            unlink($backend->favicon);
        }

        $file = $request->file('favicon');
        $extension = 'favicon'.$file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'Backend/image/BackendSetting/';
        $file->move($path, $filename);
        $backend->favicon = $path . $filename;
        }
    $backend->save();
    toastr()->success('Update Backend Successfully');
    return redirect()->back();
  }
}
