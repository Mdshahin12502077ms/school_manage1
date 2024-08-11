<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\Student;
use Nette\Utils\Random;
use Auth;

class StudentController extends Controller
{


    public function allStudent(){
        $data['student'] = Student::with('course','session')->get();
        $data['course']=CourseModel::all();
        $data['session']=Session::all();
        if(Auth::user()->admin_role=='instituteadmin'){
            $data['student'] = Student::where('created_by',Auth::user()->id)->with('course','session')->get();
        }
        return view('Backend.admin.student.AllStudent',$data);
    }
    public function addmissionForm(){
        $data['course']=CourseModel::all();
        $data['session']=Session::all();
        return view('Backend.admin.student.AdmissionForm',$data);
    }

    public function insertStudent(Request $request){


        $request->validate([
            'course_id' =>'required',
            'session_id' =>'required',
            'edu_qualification' =>'required',
            'reg_no' =>'required',
           'passing_year' =>'required',

           'st_name' =>'required',
           'f_name' =>'required',
           'm_name' =>'required',
           'gender' =>'required',
          'id_type' =>'required',
          'result' =>'required',
          'reg_board' =>'required',
          'blood_group' =>'required',


          'id_number' =>'required',
           'Date_of_birth' =>'required',
           'religion' =>'required',
           'email' =>'required',
          'social_status' =>'required',

          'mobile_no' =>'required',
           'student_photo' =>'required',
           'id_document' =>'required',
           'edu_certificate' =>'required',

        ]);

        // Create a new student record

        $student = new Student();
        $student->course_id = $request->course_id;
        $student->session_id = $request->session_id;

        if($request->edu_qualification=='others'){
            $student->edu_qualification = $request->other;
        }
        else{
            $student->edu_qualification = $request->edu_qualification;
        }
        $student->reg_no = $request->reg_no;
        $student->result = $request->result;
        $student->reg_board = $request->reg_board;
        $student->passing_year = $request->passing_year;
        $student->st_name = $request->st_name;
        $student->f_name = $request->f_name;
        $student->m_name = $request->m_name;
        $student->blood_group = $request->blood_group;
        $student->gender = $request->gender;
        $student->class_roll = $request->class_roll;
        $student->created_by=Auth::user()->id;

        $student->id_type = $request->id_type;
        $student->id_number = $request->id_number;
        $student->Date_of_birth = $request->Date_of_birth;
        $student_id=Student::orderBy('id','desc')->first();
        if($student_id==null){
            $student->st_id_number=1;
        }
        else{
            $student->st_id_number=$student_id->id+1;
        }

        $student->religion = $request->religion;
        $student->email = $request->email;
        $student->social_status = $request->social_status;
        $student->mobile_no = $request->mobile_no;
        $student->comment = $request->comment;

            $student_photo=$request->student_photo;
            if(isset($student_photo)){
            $file = $request->file('student_photo');
            $extension = 'student'.$file->getClientOriginalExtension();
            $filename = rand() . '.' . $extension;
            $path = 'Backend/image/Student/';
            $file->move($path, $filename);
            $student->student_photo = $path . $filename;

            }

            if(isset($request->id_document)){
                $file = $request->file('id_document');
                $extension = 'id'.$file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'Backend/image/Student/';
                $file->move($path, $filename);
                $student->id_document = $path . $filename;

                }

                if(isset($request->edu_certificate)){
                    $file = $request->file('edu_certificate');
                    $extension = 'edu'. $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $path = 'Backend/image/Student/';
                    $file->move($path, $filename);
                    $student->edu_certificate = $path . $filename;

                    }

        $student->save();

        // Redirect to the student list page
        toastr()->success('Student added successfully');
        return redirect()->back();
    }


    public function editStudent($id){

        $data['student'] = Student::find($id);
        $data['course']=CourseModel::all();
        $data['session']=Session::all();


        return view('Backend.admin.student.EditStudent',$data);
    }
  public function updateStudent(Request $request,$id){

    // dd($request->all());
    $student = Student::find($id);
    $student->course_id = $request->course_id;
    $student->session_id = $request->session_id;
    if($request->edu_qualification=='others'){
        $student->edu_qualification = $request->other;

    }
    else{
        $student->edu_qualification = $request->edu_qualification;
    }
    $student->reg_no = $request->reg_no;
    $student->result = $request->result;
    $student->reg_board = $request->reg_board;
    $student->passing_year = $request->passing_year;
    $student->st_name = $request->st_name;
    $student->f_name = $request->f_name;
    $student->m_name = $request->m_name;
    $student->status = $request->status;
    $student->blood_group = $request->blood_group;
    $student->gender = $request->gender;
    $student->created_by=Auth::user()->id;
    $student->class_roll = $request->class_roll;
    $student->id_type = $request->id_type;
    $student->id_number = $request->id_number;
    $student->Date_of_birth = $request->Date_of_birth;
    $student_id=Student::orderBy('id','desc')->first();
    if(isset($request->st_id_number)){
        $student->st_id_number=$request->st_id_number;
    }
    else{
        if($student_id==null){
            $student->st_id_number=1;
        }
        else{
            $student->st_id_number=$student_id->id+1;
        }
    }

    $student->religion = $request->religion;
    $student->email = $request->email;
    $student->social_status = $request->social_status;
    $student->mobile_no = $request->mobile_no;
    $student->comment = $request->comment;


    if(isset($request->student_photo)){

        if($student->student_photo && file_exists($student->student_photo)){
            unlink($student->student_photo);
        }

        $file = $request->file('student_photo');
        $extension = 'student'.$file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'Backend/image/Student/';
        $file->move($path, $filename);
        $student->student_photo = $path . $filename;
        }

        if(isset($request->id_document)){
            if($student->id_document && file_exists($student->id_document)){
                unlink($student->id_document);
            }
            $file = $request->file('id_document');
            $extension = 'id'.$file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'Backend/image/Student/';
            $file->move($path, $filename);
            $student->id_document = $path . $filename;

            $student->id_document;
            }

            if(isset($request->edu_certificate)){

                if($student->edu_certificate && file_exists($student->edu_certificate)){
                    unlink($student->edu_certificate);
                }

                $file = $request->file('edu_certificate');
                $extension = 'edu'. $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'Backend/image/Student/';
                $file->move($path, $filename);
                $student->edu_certificate = $path . $filename;
                }

    $student->save();

    // Redirect to the student list page
    toastr()->success('Student Updated successfully');
    return redirect()->back();
  }



  public function studentInfo($id){
    $data['student'] = Student::find($id);

    return view('Backend.admin.student.StudentInfo',$data);
  }

  public function deleteStudent($id){
    $deleteStudent=Student::find($id);
    if($deleteStudent->student_photo && file_exists($deleteStudent->student_photo)){
        unlink($deleteStudent->student_photo);
    }
    $deleteStudent->delete();
    toastr()->success('Student deleted successfully');
    return redirect()->back();
  }

public function Addmission_Registration(){

    return view('Backend.admin.Student.Addmission_Registration');
}


//ajax
public function searchCourseStudent(Request $request){

    $course=$request->course;
    $session=$request->session;
    $getstCourseWise=Student::where('course_id',$course)->where('session_id',$session)->get();
    return response()->json($getstCourseWise);
}

}
