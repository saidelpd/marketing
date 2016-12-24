<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Ticket;
use App\Models\RafflePhotos;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::count())
        {
            factory(User::class,50)->create();
        }
        if(!Raffle::count())
        {
            factory(Raffle::class,1)->create();
        }
        if(!Ticket::count()) {
            factory(Ticket::class, 450)->create();
        }
        if(!RafflePhotos::count()) {
            factory(RafflePhotos::class, 9)->create();
        }

    }

}
