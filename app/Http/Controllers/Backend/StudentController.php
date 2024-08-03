<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\Student;

class StudentController extends Controller
{


    public function allStudent(){
        $data['student'] = Student::with('course','session')->get();
        return view('Backend.admin.student.AllStudent',$data);
    }
    public function addmissionForm(){
        $data['course']=CourseModel::all();
        $data['session']=Session::all();
        return view('Backend.admin.student.AdmissionForm',$data);
    }

    public function insertStudent(Request $request){
        // dd($request->all());
        // Validate the form data
        // $request->validate([
        //     'name' =>'required',
        //     'email' =>'required|email|unique:students',
        //     'dob' =>'required',
        //     'course_id' =>'required',
        //    'session_id' =>'required',
        // ]);

        // Create a new student record
        $student = new Student();
        $student->course_id = $request->course_id;
        $student->session_id = $request->session_id;
        $student->edu_qualification = $request->edu_qualification;
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


        if(isset($request->student_photo)){
            $file = $request->file('student_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'Backend/image/Student/';
            $file->move($path, $filename);
            $student->student_photo = $path . $filename;
            }

            if(isset($request->id_document)){
                $file = $request->file('id_document');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'Backend/image/Student/';
                $file->move($path, $filename);
                $student->id_document = $path . $filename;
                }

                if(isset($request->edu_certificate)){
                    $file = $request->file('edu_certificate');
                    $extension = $file->getClientOriginalExtension();
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
    $student->edu_qualification = $request->edu_qualification;
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
        $extension = $file->getClientOriginalExtension();
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
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'Backend/image/Student/';
            $file->move($path, $filename);
            $student->id_document = $path . $filename;
            }

            if(isset($request->edu_certificate)){

                if($student->edu_certificate && file_exists($student->edu_certificate)){
                    unlink($student->edu_certificate);
                }

                $file = $request->file('edu_certificate');
                $extension = $file->getClientOriginalExtension();
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

  public function st_reg_view(){
    $data['student'] = Student::with('course','session')->get();
    return view('Backend.admin.student.Student_reg',$data);
  }
  public function st_reg_insert(Request $request)
{
$ids=$request->reg;
foreach($ids as $id){
    $reg=Student::where('id',$id)->get();
    dd($reg);
}
}
}
