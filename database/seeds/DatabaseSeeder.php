<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,50)->create();
        factory(Raffle::class,1)->create();
        factory(Ticket::class,450)->create();
    }

}
