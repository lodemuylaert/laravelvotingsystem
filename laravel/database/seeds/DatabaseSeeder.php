<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            CitiesTableSeeder::class,
            Voter_RoleSeeder::class,
            UsersTableSeeder::class,
            PartiesSeeder::class,
            CandidatesSeeder::class,
            ElectionSeeder::class,
            VotesTableSeeder::class,
            AdminsTableSeeder::class



        ];

        $i = 0;
        foreach ($seeders as $seeder) {
            $count = sprintf("%02d", ++$i);
            $this->command->getOutput()->writeln("<comment>Seed${count}</comment> ${seeder}..");
            $this->call($seeder);
        }
    }
}
