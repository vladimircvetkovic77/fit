<?php

namespace Database\Seeders;

use App\Models\Gym;
use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            $user->cards()->save(Card::factory()->make());
        });
        Gym::factory(10)->create();
    }
}
