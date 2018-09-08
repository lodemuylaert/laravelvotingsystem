<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    const TABLE = 'votes';
    const PK = 'uuid';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::TABLE, function (Blueprint $table) {
            $table->increments('id');
//
//            $table->uuid(static::PK)->primary(static::PK);
//            $table->string('checksum')->nullable();
            $table->unsignedInteger('election_id');
//            $table->json('details');
            $table->unsignedInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//
            $table->string('partie')->nullable();
            $table->json('candidates')->nullable();
            $table->timestamps('created_at');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(static::TABLE);
    }
}













