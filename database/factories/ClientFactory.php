<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'company_id'=> factory(\App\Model\Company::class),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'shipping_address' => $faker->address,
        'billing_address' => $faker->address
    ];
});
