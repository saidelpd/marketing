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
        'phone' => $faker->phoneNumber,
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
       'obj_name'=>'BMW M3 2015',
       'obj_cost'=>$faker->numberBetween(100000,900000),
       'ticket_cost'=>10000,
       'raffle_images_path'=>'/images/raffle/',
       'closing_date'=>\Carbon\Carbon::now()->addDay(4)->addMonth(3)
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
        'discount'=>0,
        'created_at'=>$faker->dateTimeBetween('now','3 months')
    ];
});

/**
 * Raffle-Photos Seeder
 */
$factory->define(App\Models\RafflePhotos::class, function (Faker\Generator $faker) {
    return [
        'raffle_id'=>1,
        'title'=>$faker->realText(50),
        'description'=>$faker->realText(250),
        'path'=>$faker->unique()->numberBetween(1,9).'.jpg'
    ];
});