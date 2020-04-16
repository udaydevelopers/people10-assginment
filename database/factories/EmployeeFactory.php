<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'emp_id' => factory(App\User::class)->create(),
        'emp_name' => $faker->name,
        'ip_address' => $faker->ipv4,
    ];
});
