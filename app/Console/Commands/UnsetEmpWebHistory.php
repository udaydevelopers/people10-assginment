<?php

namespace App\Console\Commands;

use App\EmployeeWebHistory;
use Illuminate\Console\Command;

class UnsetEmpWebHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:UNSET empwebhistory {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unset Employee web history by IP Address';

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
        $ip_address = $this->argument('ip');
        $res = EmployeeWebHistory::where('ip_address',$ip_address)->delete();
        if($res){
            $this->error("Record Deleted Successfully");
        }
    }
}
