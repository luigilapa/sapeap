<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(asoabo\User::class, function ($faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'user' => $faker->unique()->userName,
        'password' => bcrypt('123'),
        'type' => 'user',
    ];
});

$factory->define(asoabo\Lawyer::class, function ($faker) {
    return [
        'identification' =>$faker->unique()->numerify('1#########'),
        'registration_number'=>$faker->unique()->shuffle('ABO MAN 1234567890 XYZ -'),
        'first_name' => $faker->firstName.' '.$faker->firstName,
        'last_name' => $faker->lastName.' '.$faker->lastName,
        'gender' =>$faker->randomElement($array = array ('M','F')),
        'email' => $faker->email,
        'address' => $faker->address,
        'telephone' => $faker->numerify('02#######'),
        'mobile' => $faker->numerify('09########'),
    ];
});
