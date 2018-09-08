<?php

use Illuminate\Database\Seeder;
use App\Models\Candidates;

class CandidatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 8; $i++){
            $rand = rand(23,28);
            factory( Candidates::class, $rand)->create(['parties_id' =>  $i]);
        }


    }
}
