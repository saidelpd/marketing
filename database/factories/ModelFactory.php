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
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode
    ];
});

/**
 * Raffle Seeder
 */
$factory->define(App\Models\Raffle::class, function (Faker\Generator $faker) {
    return [
        'prefix' => 'RF',
        'obj_name' => 'Porsche 997 GT3RS 4.0 Clone (MCK-RSC 4.15)',
        'obj_cost' => 13000000,
        'ticket_cost' => 10000,
        'raffle_images_path' => '/images/raffle/1/',
        'closing_date' => \Carbon\Carbon::createFromDate(2017, 3, 1)
    ];
});

/**
 * Ticket Seeder
 */
$factory->define(App\Models\Ticket::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 52),
        'raffle_id' => 1,
        'payment_id' => $faker->numberBetween(1, 500),
        'created_at' => $faker->dateTimeBetween('now', '3 months')
    ];
});

/**
 * Raffle-Photos Seeder
 */
$factory->define(App\Models\RafflePhotos::class, function (Faker\Generator $faker) {
    $id = $faker->unique()->numberBetween(1, 3);
    $descriptions = [
        'No expense has been spared in comprehensively transforming this Porsche® 911 (model 997) into the ultimate performance machine.  MCK Engineering has built the engine from its original 3.6 liter to an awesome 4.15 liter, therefore increasing its power from 325bhp to an incredible 515bhp!  To achieve this high-level performance, MCK utilized proprietary software to reprogram the ECU and has installed a fully custom exhaust built by the motorsports exhaust experts at M&M Exhausts in Germany.  In order to best utilize this power, MCK has replaced the vehicle’s limited slip differential with a GT (Guard) one utilized in Motorsports. The suspension (including sway bars) has also been replaced with a motorsports-level coil-over set up which is completely adjustable.  The brakes have also improved with Brembo Racing rotors, pads, and brake fluid.',
        'The biggest enemy for performance is weight, as such MCK has put it through a strict weight savings regimen.  Some of the bodywork has been replaced with Carbon Fiber pieces, the wheels being utilized are MCK Engineering’s very own center lock RS-5 model, forged from 6061-T6 Aluminum which weigh just 17.5lbs up front and 19lbs in the rear!  Even the sunroof has been removed in an effort to save as much weight as possible.',
        'The interior has also received a comprehensive overhaul.  Gone are the heavy Porsche® Sport seats and in their place are GT3RS-style bucket carbon fiber seats, wrapped in black leather with beautiful, red Alcantara® inserts.  The rear seats have been removed in order to fit the rear roll bar.  Alcantara® has been used throughout various interior sections including the steering wheel, giving the MCK-RSC 4.15 an interior to match the vehicles mental performance.'];
    return [
        'raffle_id' => 1,
        'title' => '',
        'description' => $descriptions[$id-1],
        'path' => $id . '.jpg'
    ];
});

/**
 * Raffle-Photos Seeder
 */
$factory->define(App\Models\Payments::class, function (Faker\Generator $faker) {
    $ticket_number = $faker->numberBetween(1, 10);
    $charge_amount = $ticket_number * 10000;
    $fee = ($charge_amount * 2.9 / 100) + 30;
    return [
        'billing_id' => str_random(),
        'raffle_id' => 1,
        'user_id' => $faker->numberBetween(1, 52),
        'charge_amount' => $charge_amount,
        'fee' => $fee,
        'discount' => 0,
        'tickets_buy' => $ticket_number,
    ];
});