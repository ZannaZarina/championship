<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemifinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semifinals', function (Blueprint $table) {
            $table->id();
            $table->integer('first_team_id');
            $table->integer('second_team_id');
            $table->integer('winner_id');
            $table->integer('loser_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semifinals');
    }
}
