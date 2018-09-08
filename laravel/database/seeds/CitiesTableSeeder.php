<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aalst = [
            'name' => 'Aalst',
            'inhabitants' => 44.144,

        ];
        DB::table(CreateCitiesTable::TABLE)->insert($aalst);
    }
}
