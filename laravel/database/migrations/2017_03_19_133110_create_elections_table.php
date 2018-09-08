<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionsTable extends Migration
{
    const TABLE = 'elections';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('description');
            $table->dateTime('startdate');
            $table->dateTime('enddate');
            $table->integer('maxvoters');
            $table->integer('cities_id')->unsigned();
            $table->timestamps();
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE);
    }
}
