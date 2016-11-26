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

$factory->define(App\Models\Stock::class, function (Faker\Generator $faker) {

    return [
        'commodity_id' => $faker->numberBetween(10, 100),
        'stock' => $faker->randomNumber(3),
        'stock_alert' => $faker->randomNumber(2),
    ];
});

$factory->define(App\Models\StockIn::class, function (Faker\Generator $faker) {

    return [
        'commodity_id' => $faker->numberBetween(10, 100),
        'in_quantity' => $faker->randomNumber(2),
        'in_type' => $faker->randomElement(['采购入库','销售退货']),
        'in_at' => $faker->date()
    ];
});

$factory->define(App\Models\StockOut::class, function (Faker\Generator $faker) {

    return [
        'commodity_id' => $faker->numberBetween(10, 100),
        'out_quantity' => $faker->randomNumber(2),
        'out_type' => $faker->randomElement(['销售出库','采购退货']),
        'out_at' => $faker->date()
    ];
});
