<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RegistrationSession;
use App\Models\Student;
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

                    $getStudent=Student::all();
                    $RegistrationSession=RegistrationSession::where('id',$registerLimit->id)->update([
                        'status'=>'Deactive'
                    ]);

                    foreach ($getStudent as $student) {
                        $student=Student::where('status','registered')->update([
                            'status'=>'downloaded'
                        ]);
                    }
                }
            }
        return Command::SUCCESS;
    }
}
