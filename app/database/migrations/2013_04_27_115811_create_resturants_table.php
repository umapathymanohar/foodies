<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResturantsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');
			$table->integer('cuisine_id');
			$table->string('restuarantName');
			$table->string('resturantPhoto');
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
        Schema::drop('resturants');
    }

}
