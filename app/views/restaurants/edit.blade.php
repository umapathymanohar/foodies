@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="span2">
      <div id="sidebar">
        <ul class="admin-list">
          <li class="active">
             <a href="restaurant.html">Restaurants</a>
         </li>
         <li><a href="profile.html">Profile</a></li>


     </ul>
 </div>
</div>
<div class="span10">
    <ul class="breadcrumb">
      <li><a href="restaurant.html">Restaurants</a> <span class="divider">/</span></li>
      <li>Edit Restaurant</li>
  </ul>
  <h3 class="subheader">Edit Restaurant</h3>
  <div class="row">
   <div class="span10">
{{ Form::model($restaurant, array('method' => 'PATCH','files'=>'true', 'route' => array('restaurants.update', $restaurant->id))) }}
      

 {{ Form::hidden( 'business_id',  $restaurant->business_id) }}

 <form class="form-horizontal">
    <div class="control-group">
       <label class="control-label">Cuisine</label>
       
<?php 
$cuisines = Cuisine::lists('cuisineName', 'id');
?>


<div class="controls">
 {{ Form::select('cuisine_id', $cuisines, $restaurant->cuisine_id)}}
</div>
</div>
<div class="control-group">
   <label class="control-label">RestaurantName</label>



   <div class="controls">
    {{ Form::text('restaurantName') }}

</div>
</div>

<div class="control-group">
   <label for="" class="control-label">Photo</label>

   <div class="controls">
 <?php 
              $logged_in_user = Confide::user()->id;
              $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
              $restaurant_id = $restaurant->id;
                
                ?>
            @if ($restaurant->restaurantPhoto)
            <img width="200" src="{{URL::asset('/business_assets/'.$business_id.'/restaurant/'.$restaurant_id . '/' . $restaurant->restaurantPhoto )}}" alt="">
            @endif
    {{ Form::file('restaurantPhoto') }}

</div>
</div>


<hr>
<div class="control-group actions">
 <div class="controls">
    
{{ Form::submit('Update', array('class' => 'button blue')) }}
            {{ link_to_route('restaurants.show', 'Cancel', $restaurant->id, array('class' => 'button')) }}
    
</div>
</div>
</form>
</div>
</div>


</div>

</div>

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
