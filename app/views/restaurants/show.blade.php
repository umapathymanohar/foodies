@extends('layouts.scaffold')

@section('main')

<div class="row">
        <div class="span2">
          <div id="sidebar">
            <ul class="admin-list">
              <li class="active">
                {{ link_to_route('restaurants.index', 'Restaurants') }}
               
             </li>
             <li><a href="profile.html">Profile</a></li>
           </ul>
         </div>
       </div>
       <div class="span10">
        <ul class="breadcrumb">
          <li>{{ link_to_route('restaurants.index', 'Restaurants') }}<span class="divider">/</span></li>
          <li>{{$restaurant->restaurantName}}</li>
        </ul>
        <div class="page-header">
          <h3>{{$restaurant->restaurantName}}</h3>
        </div>
        <div class="row">
          <div class="span6">

             <?php 
              $logged_in_user = Confide::user()->id;
              $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
              $restaurant_id = $restaurant->id;
                
                ?>
            @if ($restaurant->restaurantPhoto)
            <img width="300" src="{{URL::asset('/business_assets/'.$business_id.'/restaurant/'.$restaurant_id . '/' . $restaurant->restaurantPhoto )}}" alt="">
            @endif


          </div>
          <div class="span4">
            <ul class="admin-list">
              <li> {{ link_to_route('restaurants.edit', 'Manage Restaurant', array($restaurant->id), array('class' => 'button blue')) }}</li>
              <li>.</li>
            <li>{{link_to_route('restaurant.menucategories.index', 'Manage Menu',  array($restaurant->id),  array('class' => 'button blue')) }}</li>
            <li>.</li>
            <li>
                 {{link_to_route('restaurants.restaurantlocations.create', 'Manage Locations',  array( $restaurant_id),  array('class' => 'button blue')) }}
            </li></ul>
              
               
            
        </div>
      </div>
      <hr>
      <h5>Menu Topic</h5>

 
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Locations</a></li>
    <li><a href="#tab2" data-toggle="tab">Section 2</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">

<?php
       $restaurantlocations = Restaurantlocation::where('restaurant_id', $restaurant_id)->get();
       
       ?>
       
      <ul>
            @foreach ($restaurantlocations as $restaurantLocation)

             <li>
        
           <address>
            {{ $restaurantLocation->restaurantAddressLine1 }}<br>
            {{ $restaurantLocation->restaurantAddressLine2 }}<br>
            {{ $restaurantLocation->restaurantCity }}, {{ $restaurantLocation->restaurantPincode }}<br>
            <abbr title="Phone">P:</abbr> {{ $restaurantLocation->restaurantPhone }}
          </address>
          <address>
            
            <a href="mailto:#">{{ $restaurantLocation->restaurantEmail }}</a>
          </address>

      </li>

<hr>

                
 @endforeach 


    </ul>
           


    </div>
    <div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div>
  </div>
</div>
   
    </div>

  </div>
  @stop