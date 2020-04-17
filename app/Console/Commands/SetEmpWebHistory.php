<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;
use App\EmployeeWebHistory;
class SetEmpWebHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:SET empwebhistory {ip} {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Employee web history add IP Address and URL';

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
        $ip = $this->argument('ip');
        $url = $this->argument('url');
        $employee = Employee::where('ip_address', $ip)->first(); 
        if($employee == null){
            $this->error("IP Address not associated with employee. Please add employee and ip address first"); 
        }else{
            $data = [
                'emp_id' => $employee->emp_id,
                'ip_address' => $ip,
                'url' => $url
            ];
            EmployeeWebHistory::create($data);
            $this->info("Web history details added successfully.");
        }
    }
}
