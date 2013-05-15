<?php

class Menuitemavailability extends Eloquent {
    protected $guarded = array();
	public $table='menuitemavailabilities';

    public static $rules = array(
		
	);


		 public function available(){
        return $this->morphTo();
    } 
}