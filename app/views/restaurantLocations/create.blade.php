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
        {{Form::open(['route' => ['restaurants.restaurantlocations.store', $restaurant_id]]);}}
        {{ Form::hidden('restaurant_id', $restaurant_id) }}


<div class="control-group">
    <label class="control-label">Phone</label>

 


 <div class="controls">

        {{ Form::text('restaurantPhone') }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Mobile</label>

 


 <div class="controls">

        {{ Form::text('restaurantMobile') }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Email</label>

 


 <div class="controls">

    {{ Form::text('restaurantEmail') }}

</div>
</div>

<div class="control-group">
 <label class="control-label">Address Line 1 </label>

 


 <div class="controls">
    {{ Form::text('restaurantAddressLine1') }}

</div>
</div>

<div class="control-group">
 <label class="control-label">Address Line 2</label>

 


 <div class="controls">
    {{ Form::text('restaurantAddressLine2') }}

</div>
</div>

<div class="control-group">
 <label class="control-label">City</label>

 


 <div class="controls">
    {{ Form::text('restaurantCity') }}

</div>
</div>


<div class="control-group">
 <label class="control-label">State</label>

 


 <div class="controls">
    {{ Form::text('restaurantState') }}

</div>
</div>

<div class="control-group">
 <label class="control-label">Country</label>

 


 <div class="controls">            {{ Form::text('restaurantCountry') }}

 </div>
</div>

<div class="control-group">
 <label class="control-label">Pincode</label>

 


 <div class="controls">            {{ Form::text('restaurantPincode') }}

 </div>
</div>

<div class="control-group">
 <label class="control-label">Working Hours</label>

 


 <div class="controls">            {{ Form::text('restaurantWorkingHours') }}


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




@extends('layouts.scaffold')

@section('main')




<h1>Create RestaurantLocation</h1>

{{Form::open(['route' => ['restaurants.restaurantlocations.store', $restaurant_id]]);}}


<ul>
    <li>
        {{ Form::hidden('restaurant_id', $restaurant_id) }}
    </li>

    <li>
        {{ Form::label('restaurantPhone', 'RestaurantPhone:') }}
        {{ Form::text('restaurantPhone') }}
    </li>

    <li>
        {{ Form::label('restaurantMobile', 'RestaurantMobile:') }}
        {{ Form::text('restaurantMobile') }}
    </li>

    <li>
        {{ Form::label('restaurantEmail', 'RestaurantEmail:') }}
        {{ Form::text('restaurantEmail') }}
    </li>

    <li>
        {{ Form::label('restaurantAddressLine1', 'RestaurantAddressLine1:') }}
        {{ Form::text('restaurantAddressLine1') }}
    </li>

    <li>
        {{ Form::label('restaurantAddressLine2', 'RestaurantAddressLine2:') }}
        {{ Form::text('restaurantAddressLine2') }}
    </li>

    <li>
        {{ Form::label('restaurantCity', 'RestaurantCity:') }}
        {{ Form::text('restaurantCity') }}
    </li>

    <li>
        {{ Form::label('restaurantState', 'RestaurantState:') }}
        {{ Form::text('restaurantState') }}
    </li>

    <li>
        {{ Form::label('restaurantCountry', 'RestaurantCountry:') }}
        {{ Form::text('restaurantCountry') }}
    </li>

    <li>
        {{ Form::label('restaurantPincode', 'RestaurantPincode:') }}
        {{ Form::text('restaurantPincode') }}
    </li>

    <li>
        {{ Form::label('restaurantWorkingHours', 'RestaurantWorkingHours:') }}
        {{ Form::text('restaurantWorkingHours') }}
    </li>

    <li>
        {{ Form::submit('Submit', array('class' => 'btn')) }}
    </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop


