<?php

class Menucategory extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'restaurant_id' => 'required',
		'categoryShow' => 'required'
	);
    public function restaurant () {
        return $this->belongsTo('restaurant');
    }

    public function children()
    {
        return $this->hasMany('Menucategory', 'parent_id', 'id')->orderBy('categoryPosition', 'desc');
    }

    public function tree($restaurant_id)
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('restaurant_id', $restaurant_id)->where('parent_id', 0)->orderBy('categoryPosition', 'desc')->get();
    }

     public function menuitemavailability(){
        return $this->morphMany('Menuitemavailability', 'available');
    }

    public function menuitemavailable(){
        return $this->hasMany('Menuitemavailability');
    } 
}