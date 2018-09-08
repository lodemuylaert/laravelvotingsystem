<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elections = [
            ['name' => 'Verkiezingen 2018', 'cities_id' => 1,'description' => 'De laatste verkiezingen vonden plaats op zondag 25 mei 2014 (federale, regionale en Europese verkiezingen). De eerstvolgende verkiezingen worden gehouden op zondag 14 oktober 2018.', 'startdate' => Carbon::today(), 'enddate' => Carbon::create(2017, 10, 14, 0, 0, 0), 'maxvoters' => '347','created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
            ['name' => 'Verkiezingen 2022', 'cities_id' => 1,'description' => 'De laatste verkiezingen vonden plaats op zondag 14 oktober 2018 (federale, regionale en Europese verkiezingen). De eerstvolgende verkiezingen worden gehouden op zondag 14 oktober 2022.', 'startdate' => Carbon::create(2022, 10, 14, 0, 0, 0), 'enddate' => Carbon::create(2022, 14, 23, 59, 59), 'maxvoters' => '83347','created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],

        ];
        DB::table(CreateElectionsTable::TABLE)->insert($elections);
    }
}
