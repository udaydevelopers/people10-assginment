<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;
class SETEmpData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SET:empdata {id} {name} {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Employee date id,name and IP address';

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
        $data = [
            'emp_id' => $this->argument('id'),
            'emp_name' => $this->argument('name'),
            'ip_address' => $this->argument('ip')
        ];

        Employee::create($data);
        $this->info("Record Created");
    }
}
