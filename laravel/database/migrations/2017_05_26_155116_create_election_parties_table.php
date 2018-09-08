<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionPartiesTable extends Migration
{
    const TABLE = 'election_parties';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('election_id')->unsigned();
            $table->foreign('election_id')->unsigned()->references('id')->on('elections');
            $table->integer('parties_id')->unsigned();
            $table->foreign('parties_id')->unsigned()->references('id')->on('parties');

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
