<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuitemavailabilitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuitemavailabilities', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
			$table->string('availMonday');
			$table->string('availTuesday');
			$table->string('availWednesday');
			$table->string('availThursday');
			$table->string('availFriday');
			$table->string('availSaturday');
			$table->string('availSunday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menuitemavailabilities');
    }

}
