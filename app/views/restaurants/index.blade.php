@extends('layouts.scaffold')

@section('main')

 <div class="row">
        @include('layouts.sidebar');
       <div class="span10">
        <ul class="breadcrumb">
          <li>Restaurants</li>
        </ul>
        <div class="row-fluid">
          <ul class="unstyled">
           <li class="span3">
            <div class="grid-box add">
             <h2>
<a href="{{URL::route('restaurants.create')}}"><i class="icon-plus"></i>Restaurant</a>
 </h2>
           </div>
         </li>

         @if ($restaurants->count())

             @foreach ($restaurants as $restaurant)
        
              
         <li class="span3">
          <div class="grid-box">
            <div class="restaurant-photo">
        <?php
              $logged_in_user = Confide::user()->id;
              $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
              $restaurant_id = $restaurant->id;
        ?>
             
            @if ($restaurant->restaurantPhoto)
            <a href="{{URL::route('restaurants.show', $restaurant_id)}}">
            <img width="200" src="{{URL::asset('/business_assets/'.$business_id.'/restaurant/'.$restaurant_id . '/' . $restaurant->restaurantPhoto )}}" alt="">
            </a>
            @endif
            </div>
            <h3 class="res-title">{{$restaurant->restaurantName}}</h3>
            
            <p>
              {{ link_to_route('restaurants.edit', 'Manage', array($restaurant->id)) }}
              
               <!-- link_to_route('restaurant.menucategories.index', 'Create Menu',  array($restaurant->id))  -->
                
<!--                 | 

                 {{ Form::open(array('method' => 'DELETE', 'route' => array('restaurants.destroy', $restaurant->id))) }}
                 <button type="submit">Delete</button>
                            
 -->
                </p>
          </div>
        </li>

         @endforeach

         @else
    There are no restaurants
@endif


      </ul>
    </div>
    <hr>
    <div class="pagination pagination-centered">
      <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">Next</a></li>
      </ul>
    </div>
  </div>

</div>
@stop