<?php

class Menuitem extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'category_id' => 'required',
	 
	);


	 public function menuitemavailability(){
        return $this->morphMany('Menuitemavailability', 'available');
    } 
}