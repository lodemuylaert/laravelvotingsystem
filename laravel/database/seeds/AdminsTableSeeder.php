<?php


use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'lode',
            'email' => 'lode.muylaert@hotmail.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'superadmin' => true,
            'softdeleted' => false,
            'created_at' => Carbon::now('Europe/Brussels'),
            'updated_at' => Carbon::now('Europe/Brussels')
        ]);
        factory(Admin::class, 8)->create();


    }
}
