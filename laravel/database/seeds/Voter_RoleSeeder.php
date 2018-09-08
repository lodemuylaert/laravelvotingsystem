<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Voter_RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     $roles = [
         ['name' => 'admin', 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
         ['name' => 'voter', 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
         ['name' => 'candidate', 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')]

     ];
    DB::table(CreateVoterRolesTable::TABLE)->insert($roles);
    }
}
