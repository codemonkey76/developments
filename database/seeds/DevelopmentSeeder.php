<?php

use App\Development;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Development::create(['id'=>41,'development' => 'The Parks']);
        Development::create(['id'=>42,'development' => 'RiverParks']);
        Development::create(['id'=>43,'development' => 'Vistas North']);
        Development::create(['id'=>44,'development' => 'Springbrook']);
        Development::create(['id'=>45,'development' => 'Bellmere']);
        Development::create(['id'=>49,'development' => 'The Outlook']);
        Development::create(['id'=>50,'development' => 'The Pocket']);
        Development::create(['id'=>51,'development' => 'Cherrybrook']);
    }
}
