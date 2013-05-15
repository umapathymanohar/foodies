@extends('layouts.scaffold')

@section('main')

<div class="row">
  @include('layouts.sidebar');

  <?php 
  $restaurant = Menucategory::with('restaurant')->where('id', $category_id)->first();
  $restaurantName=$restaurant->restaurant->restaurantName;
  $restaurant_id=$restaurant->restaurant->id;
  ?>

  <div class="span10">
   <ul class="breadcrumb">
     
    <li><a href="{{URL::route('restaurants.show', $restaurant_id)}}">{{$restaurantName}}</a><span class="divider">/</span></li>
    <li><a href="{{URL::route('restaurant.menucategories.index', array($restaurant_id))}}">{{$categoryName = Menucategory::with('restaurant')->where('id', $category_id)->first()->categoryName;}}</a><span class="divider">/</span></li>
    
    
    <li>Items</li>
  </ul>
  <div class="page-header">
    {{ link_to_route('categories.menuitems.create', 'Add item', $category_id, array('class' => 'button primary pull-right') ) }}
    
    <h3>{{$restaurantName}} </h3>
  </div> 
  <h5>{{$categoryName;}}</h5>
  <?php 
  
  
  ?>

  @if ($menuitems->count())
  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Photo</th>
        <th>Title</th>
        <th>Working Hours</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($menuitems as $menuitem)
      <tr>
        <td>
          <ul>
            <li>       <a href="{{ URL::route('items.order', [$menuitem->id, 'up']) }}" >↑</a> </li>
            <li><a href="{{ URL::route('items.order', [$menuitem->id, 'down']) }}" >↓</a></td></li>
          </ul>
        </td>
        <td width="15%"><img data-src="holder.js/100x100" alt=""></td>
        <td width="30%"><h5>{{ $menuitem->itemName }}</h5><p>{{ $menuitem->itemDescription }}</p></td>
        
        <td>{{ $menuitem->itemWorkingHours}}</td>
        <td>
          <a href="" data-id="{{$menuitem->id}}" class="add-images">Add Images</a>
          <input type="hidden" id="item_id">
        </td>
        <!-- <td> link_to_route('item.images.index', 'Add Images', array($menuitem->id), array('class'=>'add-images')) </td> -->
        <td>{{ link_to_route('categories.menuitems.edit', 'Manage', array($menuitem->category_id, $menuitem->id)) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  

  @else
  There are no menuitems
  @endif

  
</div>

</div>


@stop