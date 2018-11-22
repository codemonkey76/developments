<?php

use App\Stage;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createStages(41, 17);
        $this->createStages(42, 31);
        $this->createStages(43, 3);
        $this->createStages(44, 13);
        $this->createStages(45, 3);
        $this->createStages(49, 10);
        $this->createStages(50, 4);
        $this->createStages(51, 20);
    }
    public function createStages($devID, $numStages) {
        for ($i=0;$i<$numStages;$i++) {
            Stage::create(['development_id' => $devID, 'stage' => 'Stage '. ($i+1)]);
        }
    }
}
