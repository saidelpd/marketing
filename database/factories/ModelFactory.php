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

/**
 * Users Sedder
 */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/**
 * Raffle Seeder
 */
$factory->define(App\Models\Raffle::class, function (Faker\Generator $faker) {
   return [
       'prefix'=>'RF',
       'obj_name'=>'BMW',
       'obj_cost'=>$faker->numberBetween(100000,90000),
       'ticket_cost'=>10000,
       'raffle_images_path'=>storage_path('photos'),
       'closing_date'=>\Carbon\Carbon::now()->addMonth(2)
   ];
});

/**
 * Ticket Seeder
 */
$factory->define(App\Models\Ticket::class, function (Faker\Generator $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,50),
        'raffle_id'=>1,
        'fee'=>$faker->numberBetween(100,500),
        'discount'=>0
    ];
});