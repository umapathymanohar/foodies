<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuitemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuitems', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
			$table->string('itemName');
			$table->string('itemDescription');
			$table->string('itemPrice');
			$table->string('itemPosition');
			$table->string('availableFrom');
			$table->string('availableTill');
			$table->string('itemShow');
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
        Schema::drop('menuitems');
    }

}
