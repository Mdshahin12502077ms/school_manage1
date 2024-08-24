<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\Student;
use App\Models\EducationYear;
use App\Models\RegistrationSession;
use App\Models\StRegistrationFund;
use Nette\Utils\Random;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentRgisterFundController extends Controller
{
    public function add_fund(){

        return view('Backend.admin.Registration.AddFund');
    }

    public function allFund(){

        $data['course']=CourseModel::all();
        $data['session']=Session::with('eduyear')->where('status','Active')->get();
        $data['available_payment']=StRegistrationFund::where('institute_id',Auth::user()->branch_id)->first();


        return view('Backend.admin.Registration.CreateFundView',$data);
    }

    public function getFund(Request $request)
    {
        $course_id = $request->input('course_id');
        $session_id = $request->input('session_id');
       $getFund=StRegistrationFund::where('session_id',$session_id)->where('course_id',$course_id)->with('session','course')->get();
     
      return response()->json($getFund);

    }
}
