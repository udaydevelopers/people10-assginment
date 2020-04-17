<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;
class GetEmpData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:GET empdata {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch employee data through IP address';

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
        $employee = Employee::select('emp_id', 'emp_name', 'ip_address')->where('ip_address', $ip_address)->get();
        echo json_encode($employee);
    }
}
