<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BranchSubscription;
use App\Models\Branch;
use Carbon\Carbon;
class branchSubsCorn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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

        $branchSubscription=BranchSubscription::all();


            foreach ($branchSubscription as $branchSubscription) {
                if (Carbon::now() > $branchSubscription->expired_date) {
                    $branchsubs=Branch::where('id',$branchSubscription->branch_id)->update([
                        'status'=>'Expired'
                    ]);
                 
                }
            }
        return Command::SUCCESS;
    }
}
