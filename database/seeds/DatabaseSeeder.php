<?php

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
        $this->call(DevelopmentSeeder::class);
        $this->call(StageSeeder::class);
        $this->call(LotSeeder::class);
        $this->call(LandDetailSeeder::class);
    }
}
