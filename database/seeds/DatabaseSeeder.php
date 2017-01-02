<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Ticket;
use App\Models\RafflePhotos;
use App\Models\Payments;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $this->addAdmins();
            factory(User::class, 50)->create();
        }
        if (!Raffle::count()) {
            factory(Raffle::class, 1)->create();
        }
        if (!Ticket::count()) {
            factory(Ticket::class, 1000)->create();
        }
        if (!RafflePhotos::count()) {
            factory(RafflePhotos::class, 3)->create();
        }
        if (!Payments::count()) {
            factory(Payments::class, 500)->create();
        }

    }

    /**
     * Add Admins Users
     */
    private function addAdmins()
    {
        User::create(
            ['name' => 'Marc',
                'last_name' => 'Segal',
                'email' => 'marc@fantasymarketing.us',
                'password' => \Illuminate\Support\Facades\Hash::make('FantasyAdminTest2231!@'),
                'phone' => 9543708042,
                'permissions' => 'admin',
                'address' => '6825 SW 21 CT., Suite 2',
                'city' => 'Davie',
                'state' => 'FL',
                'zip' => '33317'
            ]);
        User::create(
            ['name' => 'Saidel',
                'last_name' => 'Perez',
                'email' => 'saidelpd@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('kurtcobain85'),
                'phone' => 7867791558,
                'permissions' => 'admin',
                'address' => '7520 BrookHaven Ct',
                'city' => 'Tampa',
                'state' => 'FL',
                'zip' => '33634'
            ]);
    }

}
