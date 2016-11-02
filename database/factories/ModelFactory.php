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

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'price' => $faker->randomNumber(4),
        'stock' => $faker->randomNumber(5),
        'stock_alert' => $faker->randomNumber(4),
        'supplier_id' => $faker->numberBetween(1, 100),
    ];
});

