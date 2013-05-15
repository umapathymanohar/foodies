<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenucategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menucategories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id');
            $table->integer('parent_id');
			$table->string('categoryName');
			$table->string('categoryDescription');
			$table->string('categoryPosition');
			$table->string('availableFrom');
			$table->string('availableTill');
			$table->string('categoryShow');
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
        Schema::drop('menucategories');
    }

}
