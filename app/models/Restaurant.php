<?php

class Restaurant extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'cuisine_id' => 'required',
		'restaurantPhoto' => 'required'
	);
}