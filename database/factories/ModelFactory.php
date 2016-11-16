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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) {

    return [
        'company_name' => $faker->company,
        'company_phone' => $faker->tollFreePhoneNumber,
        'contact_name' => $faker->name,
        'mobile_phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'description' => $faker->realText(rand(50, 200)),
    ];
});

$factory->define(App\Models\Supplier::class, function (Faker\Generator $faker) {

    return [
        'company_name' => $faker->company,
        'company_phone' => $faker->tollFreePhoneNumber,
        'contact_name' => $faker->name,
        'mobile_phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'description' => $faker->realText(rand(50, 200)),
    ];
});

$factory->define(App\Models\Commodity::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->userName,
        'sales_price' => $faker->randomNumber(4),
        'purchase_price' => $faker->randomNumber(4),
        'unit' => $faker->randomElement(['台','件','箱']),
        'supplier_id' => $faker->numberBetween(1, 42)
    ];
});

