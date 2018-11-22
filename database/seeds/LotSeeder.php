<?php

use App\Lot;
use App\Stage;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stages = Stage::all();

        foreach($stages as $stage) {
            $this->createLots($stage->id, 10);
        }
    }
    public function createLots($stageId, $numLots)
    {
        for ($i=0;$i<$numLots;$i++) {
            Lot::create(['stage_id'=>$stageId, 'lot_number'=>($i+1)]);
        }
    }

}
