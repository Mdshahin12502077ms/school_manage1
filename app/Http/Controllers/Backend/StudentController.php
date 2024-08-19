<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\Student;
use App\Models\EducationYear;
use App\Models\RegistrationSession;
use Nette\Utils\Random;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
class StudentController extends Controller
{


    public function allStudent(){
        $data['student'] = Student::with('course','session')->get();
        $data['course']=CourseModel::all();
        $data['session']=Session::with('eduyear')->where('status','Active')->get();
        $data['year']=EducationYear::All();
        // dd($data['session']);
        if(Auth::user()->admin_role=='instituteadmin'){
            $data['student'] = Student::where('created_by',Auth::user()->id)->with('course','session')->get();
        }
        return view('Backend.admin.student.AllStudent',$data);
    }
    public function addmissionForm(){
        $data['course']=CourseModel::all();
        $data['session']=Session::where('status','Active')->get();
        return view('Backend.admin.student.AdmissionForm',$data);
    }

    public function insertStudent(Request $request){

    //    dd($request->all());
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

        $education=EducationYear::where('status','Active')->first();
        $student->eduyear_id=$education->id;
        $student->reg_no = $request->reg_no;
        $student->result = $request->result;
        $student->reg_board = $request->reg_board;
        $student->passing_year = $request->passing_year;
        $student->st_name = $request->st_name;
        $student->f_name = $request->f_name;
        $student->m_name = $request->m_name;
        $student->blood_group = $request->blood_group;
        $student->gender = $request->gender;
        $student->status ='pending';
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
            // dd($student);
        $student->save();

        // Redirect to the student list page
        toastr()->success('Student added successfully');
        return redirect()->back();
    }


    public function editStudent($id){

        $data['student'] = Student::find($id);
        $data['course']=CourseModel::all();
        $data['session']=Session::where('status','Active')->get();


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
    $education=EducationYear::where('status','Active')->first();
    $student->eduyear_id=$education->id;
    $student->reg_board = $request->reg_board;
    $student->passing_year = $request->passing_year;
    $student->st_name = $request->st_name;
    $student->f_name = $request->f_name;
    $student->m_name = $request->m_name;
    // $student->status = $request->status;
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
public function search_student(Request $request){





            if(Auth::user()->admin_role=='superadmin'){
                    $registration=$request->registration;
                    $course=$request->course_id;
                    $branch_id=$request->branch_id;
                    $auth_role=Auth::user()->admin_role;
                    $user=Auth::User()->where('branch_id',$branch_id)->first();
                    $user_id=$user->id;
                    $session_id=$request->session_id;
                    $eduyear_id=$request->eduyear_id;
                  if($registration=='Addmitted_List'){
                    $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',Auth::user()->id)->get();
                        return response()->json([

                            'data'=>$getstCourseWise,
                             'auth_role'=> $auth_role,

                        ]);
                }

                elseif($registration=='Registered_Student'){
                    $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','registered')->where('created_by',Auth::user()->id)->get();
                    return response()->json([

                        'data'=>$getstCourseWise,
                         'auth_role'=> $auth_role,

                    ]);
                }

                    else{
                        $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',Auth::user()->id)->get();
                        return response()->json([

                            'data'=>$getstCourseWise,
                             'auth_role'=> $auth_role,

                        ]);
                    }

             }

             else{
                $registration=$request->registration;
                $auth_role=Auth::user()->admin_role;
                 $course=$request->course_id;
                 $session_id=$request->session_id;
                 $eduyear_id=$request->eduyear_id;
                 if($session_id==null){
                    return response()->json('Data Not Found');
                }
                else{
                    if($registration=='Addmitted_List'){
                        $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',Auth::user()->id)->get();
                        return response()->json([

                            'data'=>$getstCourseWise,
                             'auth_role'=> $auth_role,

                        ]);
                    }

                     elseif($registration=='Registered_Student'){
                    $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','registered')->where('created_by',Auth::user()->id)->get();
                    return response()->json([

                        'data'=>$getstCourseWise,
                         'auth_role'=> $auth_role,

                    ]);
                    }

                    else{
                        $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',Auth::user()->id)->get();
                        return response()->json([

                            'data'=>$getstCourseWise,
                             'auth_role'=> $auth_role,

                        ]);
                    }
                }

             }

}

public function get_session(Request $request){

    $session_name='';
    $session= Session::where('course_id',$request->course_id)->where('status','Active')->get();

    foreach( $session as $session){
        $session_name.="<option value='".$session->id."'>".$session->session_name."</option> ";
    }
    echo $session_name;
}

public function newRegistration(Request $request)
{

    $data['student'] = Student::with('course','session')->get();
    $data['course']=CourseModel::all();
    $data['session']=Session::with('eduyear')->where('status','Active')->get();
    $data['year']=EducationYear::All();
    $data['get_reg_limit']=RegistrationSession::orderBy('id','desc')->with('session')->get();

    foreach($data['get_reg_limit'] as $limit){
        if($limit->time_setup_type=='Register'&& $limit->session->status=='Active'&& $limit->status=='Active'){
           $data['limit']= RegistrationSession::orderBy('id','desc')->with('session')->first();

        }
        else{
            $data['limit']= RegistrationSession::orderBy('id','desc')->with('session')->first();
        }

    }

    return view('Backend.admin.student.student_register',$data);

}

public function newRegistrationInsert(Request $request){


        $action = $request->input('action');
        $session=$request->session_id;

        $registration=RegistrationSession::where('session_id',$session)->where('time_setup_type','Registration')->where('status','Active')->first();
        // dd( $registration);
        if($registration!=null){
            if( $registration->session->status=='Active'){
                                  if ($action == 'register') {
                                      $studentIds = $request->St_reg;
                                      if($studentIds!=null){
                                          foreach ($studentIds as $studentId) {
                                              // Retrieve the student model by ID
                                              $student = Student::find($studentId);

                                               $st_registration='42700'.+ $student->id;
                                              // Check if student exists
                                              if ($student) {
                                                  // Update the property
                                                  $student->st_course_reg =$st_registration;
                                                  $student->status='registered';
                                                  // Save the changes
                                                  $student->save();
                                                  toastr()->success('Student Registration Successfully Done');
                                                  return redirect()->back();
                                              }
                                          }
                                      }
                                         else{
                                           toastr()->error('No Student Selected For Registration');
                                           return redirect()->back();
                                         }
                                      // Process the registration
                                  }

                                  elseif ($action == 'print') {
                                      toastr()->success('Printed Data Successfully');
                                      return redirect()->back();
                                  }
        }
    }
        else{
            toastr()->error('Registration Time Expired');
            return redirect()->back();
        }


}

public function CancelRegister(Request $request,$id){
    $student = Student::find($id);
    $student->status='pending';
    $student->save();
    toastr()->success('Register Cancel Successfully');
    return redirect()->back();
}

public function print_student(Request $request){

    $ids = $request->input('ids', '');
    $idsArray = explode(',', $ids);
    if($ids!=null){
        $students = Student::whereIn('id', $idsArray)->get();

        // Return view with students or handle print logic
        return view('Backend.admin.student.print_student', compact('students'));
    }
   else{
     toastr()->error('No Student Selected For Print');
     return redirect()->back();
   }

}


}
