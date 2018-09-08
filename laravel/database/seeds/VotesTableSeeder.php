<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Vote;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vote::class, 79)->create();
    }
}
