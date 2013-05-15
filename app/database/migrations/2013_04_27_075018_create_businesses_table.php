<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
			$table->string('fullName');
			$table->string('businessName');
			$table->string('businessLogo');
			$table->string('businessCurrency');
			$table->string('businessTimeZone');
			$table->string('businessAddressLine1');
			$table->string('businessAddressLine2');
			$table->string('businessCountry');
			$table->string('businessState');
			$table->string('businessCity');
			$table->string('businessPincode');
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
        Schema::drop('businesses');
    }

}
