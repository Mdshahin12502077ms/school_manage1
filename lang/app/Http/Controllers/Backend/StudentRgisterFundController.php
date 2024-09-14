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
       $getAmount=StRegistrationFund::where('session_id',$session_id)->where('course_id',$course_id)->orderBy('id','desc')->with('session','course')->first();
      return response()->json([
            'data'=>$getFund,
            'amount'=>$getAmount->available_amount,
    ]);

    }

    public function fundInsert(Request $request){

        $request->validate([
            'amount' =>'required|numeric',
            'pay_for' =>'required',
            'session_name' =>'required',
            'course_name' =>'required',

        ]);
      $data=new StRegistrationFund();
      $data->institute_id=Auth::user()->branch_id;
      $data->course_id=$request->course_id;
      $data->session_id=$request->session_id;
      $data->amount=$request->amount;
      $invoice=StRegistrationFund::orderBy('id', 'DESC')->first();

      if( $invoice==null){
        $data->invoice_number='1632'.+1;
      }
      else{
        $last_invoice_number=StRegistrationFund::orderBy('id', 'DESC')->first();
        $data->invoice_number=$last_invoice_number->invoice_number+1;
      }
      $av_amount=StRegistrationFund::where('course_id',$request->course_id)->where('session_id',$request->session_id)->orderBy('id', 'DESC')->first();

      if($av_amount==null){
        $data->available_amount=$request->amount;
      }
      else{
        $data->available_amount=$av_amount->available_amount+$request->amount;
       }

      $data->pay_for=$request->pay_for;
      $data->status='Pending';
      $data->save();
        toastr()->success('Add Fund Successfully Done');
      return redirect()->back();
    }

    public function fundVoucherPdf($id){
        // dd($id);
       $data['voucher']=StRegistrationFund::find($id);
       $data['year']=EducationYear::where('status','Active')->first();
       $pdf = PDF::loadView('Backend.admin.Registration.FundVoucherPdf', $data);
       return $pdf->stream('FundVoucher.pdf');
    }
}
