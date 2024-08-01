<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseModel;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function allSession(){
      $data['session']=Session::with('course')->get();
      return view('Backend.admin.Session.sessionAll',$data);
    }


    public function addSession(){
        $data['getCourse']=CourseModel::where('status','Active')->get();

        return view('Backend.admin.Session.sessionAdd',$data);
    }

    public function insertSession(Request $request){
        $session=new Session();
        $session->session_name=$request->session_name;
        $session->course_id=$request->course_id;
        $session->status=$request->status;
        $session->save();
        toastr()->success('Session Add Successfully');
        return redirect()->back();
        }


        public function editSession($id){
            $data['sessionEdit']=Session::find($id);
            $data['getCourse']=CourseModel::where('status','Active')->get();

            return view('Backend.admin.Session.SessionEdit',$data);
        }


        public function updateSession(Request $request,$id){
            $session=Session::find($id);
            $session->session_name=$request->session_name;
            $session->course_id=$request->course_id;
            $session->status=$request->status;
            $session->save();
            toastr()->success('Session Update Successfully');
            return redirect()->back();
            }


            public function deleteSession($id){
                $session=Session::find($id);
                $session->delete();
                toastr()->success('Session Deleted Successfully');
                return redirect()->back();
            }
}
