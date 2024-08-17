<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RegistrationSession;
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
        $registerLimit=RegistrationSession::all();


            foreach ($registerLimit as $registerLimit) {
                if (Carbon::now() >$registerLimit->ending_date) {
                    $RegistrationSession=RegistrationSession::where('id',$registerLimit->id)->update([
                        'status'=>'Deactive'
                    ]);

                }
            }
        return Command::SUCCESS;
    }
}
