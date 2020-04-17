<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;
use App\EmployeeWebHistory;
class GetEmpWebHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:GET empwebhistory {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Employee web history data by IP Address';

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
        $employee = Employee::where('ip_address', $ip)->first(); 
        if($employee == null){
            $this->error("Record not exist");  
        }else{
            $data = [
                'emp_id' => $employee->emp_id,
                'ip_address' => $ip,
                'urls' => EmployeeWebHistory::where('ip_address', $ip)->select('url')->pluck('url')->all()
            ];
            echo json_encode($data);
        }
    }
}
