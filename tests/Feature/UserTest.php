<?php

namespace Tests\Feature;
use App\Employee;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{ 
    /** @test */
    use RefreshDatabase;

    public function add_to_employee_table()
    {
        $employee = factory(Employee::class)->create();
        $emp_id = $employee->emp_id;
        $this->assertNotEmpty($emp_id);
    }

    /** @test */
    public function post_employee_record_by_api()
    {  
        $response = $this->post('/api/employees',[
            'emp_id' => 3,
            'emp_name' => "Jiyo KJ",
            'ip_address' => "192.168.445.220"
        ]);
        $response->assertStatus(201);
    }
}
