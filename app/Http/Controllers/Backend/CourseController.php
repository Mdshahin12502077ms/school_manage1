<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function allCourse(){

    }

    public function addCourse(){
          return view('Backend.admin.Course.courseAdd');
    }

    public function insertCourse(Request $request){
        $course=new CourseModel();
        $course->course_name=$request->course_name;
        $course->course_code=$request->course_code;
        $course->course_duration=$request->course_duration;
        $course->course_amount=$request->course_amount;
          $course->status=$request->status;
          toastr()->success('Course Save Successfully');
          return redirect()->back();
    }
    
}
