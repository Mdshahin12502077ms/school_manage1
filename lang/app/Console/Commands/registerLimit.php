<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RegistrationSession;
use App\Models\StRegistrationFund;
use App\Models\Student;
use App\Models\User;
use Auth ;
use Carbon\Carbon;
class registerLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:limit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $registerLimit=RegistrationSession::where('time_setup_type','Registration')->where('status','Active')->get();




            foreach ($registerLimit as $registerLimit) {

                if (Carbon::now() >$registerLimit->ending_date) {


                    $RegistrationSession=RegistrationSession::where('id',$registerLimit->id)->update([
                        'status'=>'Deactive'
                    ]);


                    // $paymentDetails = StRegistrationFund::where('session_id', $registerLimit->session_id)
                    // ->where('status', 'paid')
                    // ->get();
                    // foreach($paymentDetails as $paymentDetail) {
                    //     $getBranches = User::where('branch_id', $paymentDetail->branch_id)->get();

                    //     foreach($getBranches as $getBranch) {
                    //         $getStudents = Student::where('created_by', $getBranch->id)
                    //                               ->where('status', 'registered')
                    //                               ->where('session_id', $paymentDetail->session_id)
                    //                               ->get();
                    $paymentDetails= StRegistrationFund::where('session_id', $registerLimit->session_id)
                    ->where('status', 'paid')
                    ->get();
                    foreach( $paymentDetails as  $paymentDetails){
                        $getBranches =User::where('branch_id', $paymentDetails->branch_id)->get();
                        foreach($getBranches as $getBranch){
                            $getStudents=Student::where('created_by',$getBranch->id)->get();
                            foreach($getStudents as $student) {
                                $student->where('status','registered')->where('session_id',$registerLimit->session_id)->update([
                                    'status' => 'downloaded'
                                ]);
                            }
                        }

                    }

                        }

        return Command::SUCCESS;
    }
}
}
