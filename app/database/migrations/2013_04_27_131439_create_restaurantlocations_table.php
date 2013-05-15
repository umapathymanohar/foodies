<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantLocationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurantLocations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id');
			$table->string('restaurantPhone');
			$table->string('restaurantMobile');
			$table->string('restaurantEmail');
			$table->string('restaurantAddressLine1');
			$table->string('restaurantAddressLine2');
			$table->string('restaurantCity');
			$table->string('restaurantState');
			$table->string('restaurantCountry');
			$table->string('restaurantPincode');
			$table->string('restaurantWorkingHours');
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
        Schema::drop('restaurantLocations');
    }

}
