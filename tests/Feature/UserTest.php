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
}
