<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\WorkStatus;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates all the necessary database inserts so the application works as intended.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $workStatuses = ['Plānotie darbi', 'Pašreizējie darbi', 'Pabeigtie darbi'];
        foreach ($workStatuses as $status)
        {
            $workStatus = new WorkStatus;

            $workStatus->status = $status;

            $workStatus->save();

            $this->info($status . ' row added to the work_statuses table.');
        }
    }
}
