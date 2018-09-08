<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table(CreateUsersTable::TABLE)->insert([
            'name' => 'lode',
            'email' => 'lode.muylaert@hotmail.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'voterroles_id' => 1,
            'rijksregister' => "95.12.27-398.68",
            'birth' => "1995-12-27",
            'created_at' => Carbon::now('Europe/Brussels'),
            'updated_at' => Carbon::now('Europe/Brussels')


        ]);

       factory(User::class, 80)->create();

    }
}
