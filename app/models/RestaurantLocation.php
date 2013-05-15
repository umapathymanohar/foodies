<?php

class RestaurantLocation extends Eloquent {
    protected $guarded = array();

	protected $table='restaurantLocations';

    public function resturants()
    {
        return $this->hasMany('Resturant');
    }

    public static $rules = array(
		
	);
}