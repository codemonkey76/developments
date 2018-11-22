<?php

use App\LandDetail;
use App\Lot;
use Illuminate\Database\Seeder;

class LandDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lots = Lot::all();
        foreach ($lots as $lot)
        {
            LandDetail::create(['lot_id' => $lot->id]);
        }

    }
}
