<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('BusinessesTableSeeder');
		$this->call('BusinessesTableSeeder');
		$this->call('ResturantsTableSeeder');
		$this->call('CuisinesTableSeeder');
		$this->call('RestaurantlocationsTableSeeder');
		$this->call('RestaurantsTableSeeder');
		$this->call('MenucategoriesTableSeeder');
		$this->call('MenusubcategoriesTableSeeder');
		$this->call('MenuitemsTableSeeder');
		$this->call('MenuitemimagesTableSeeder');
		$this->call('MenuitemavailabilitiesTableSeeder');
	}

}