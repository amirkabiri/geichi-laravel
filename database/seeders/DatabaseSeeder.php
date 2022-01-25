<?php

namespace Database\Seeders;

use App\Models\Barber;
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
         \App\Models\Shop::factory(100)->create()->each(function ($shop){
             $shop->barbers()->save(Barber::factory()->make());
         });
        Barber::factory(500)->create();
    }
}
