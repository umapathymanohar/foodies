<?php

class Cuisine extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'cuisineName' => 'required'
	);
}