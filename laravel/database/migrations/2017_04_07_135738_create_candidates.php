<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidates extends Migration
{
    const TABLE = 'candidates';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('positionid');
            $table->string('name');
            $table->integer('votes');
            $table->boolean('deleted');
            $table->integer('parties_id')->unsigned();;
            $table->timestamps();
        });
        Schema::table('candidates', function (Blueprint $table) {
            $table->foreign('parties_id')->references('id')->on('parties')->onDelete('cascade');
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
