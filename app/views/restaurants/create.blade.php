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
      <li>Add Restaurant</li>
  </ul>
  <h3 class="subheader">Add Restaurant</h3>
  <div class="row">
   <div class="span10">
     {{ Form::open(['route' => 'restaurants.store', 'files' => 'true'], array('class="form-horizontal"')) }}
     <?php 
     $logged_in_user = Confide::user()->id;
     $business = Business::where('user_id', '=', $logged_in_user)->first();  
     if ($business){
        $business_id = $business->id;
    }
    else
    {
     $business_id = 0 ;
 }
 ?>

 {{ Form::hidden( 'business_id',  $business_id) }}

 <form class="form-horizontal">
    <div class="control-group">
       <label class="control-label">Cuisine</label>
       
<?php 
$cuisines = Cuisine::lists('cuisineName', 'id');
?>


<div class="controls">
 {{ Form::select('cuisine_id', $cuisines)}}
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

    {{ Form::file('restaurantPhoto') }}

</div>
</div>


<hr>
<div class="control-group actions">
 <div class="controls">
    <a href="#" class="button">Cancel</a>

    {{ Form::submit('Submit', array('class' => 'button blue')) }}
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


