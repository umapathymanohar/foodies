@extends('layouts.scaffold')

@section('main')

<?php 
 
 $restaurantName = Restaurant::where('id', $restaurant_id)->first()->restaurantName;
?>
<div class="row">
       @include('layouts.sidebar');
       <div class="span10">
        <ul class="breadcrumb">
          <li><a href="{{URL::route('restaurants.index')}}">Restaurants</a> <span class="divider">/</span></li>
    <li><a href="{{URL::route('restaurants.show', $restaurant_id)}}">{{$restaurantName}}</a><span class="divider">/</span></li>
    <li>Category</li>
        </ul>
        <div class="page-header">
            {{ link_to_route('restaurant.menucategories.create', 'Add category', $restaurant_id, array('class' => 'button primary pull-right')) }}
          
          <h3>{{$restaurantName}}</h3>
        </div> 
        <table class="table">
         <tbody>
            @foreach ($menucategories as $menucategory)
          <tr>
            <td>
            <ul>
                      <li>       <a href="{{ URL::route('categories.order', [$menucategory->id, 'up']) }}" >↑</a> </li>
                      <li><a href="{{ URL::route('categories.order', [$menucategory->id, 'down']) }}" >↓</a></td></li>
                    </ul> 
                        
                </td>
            <td width="60%"><h5>{{ $menucategory->categoryName }}</h5>

            <ul class="unstyled subcategory">
                @foreach ($menucategory->children as $menucategoryChild)
              <li>


                    <a href="{{ URL::route('categories.order', [$menucategoryChild->id, 'up']) }}" class="">↑</a> 
                        <a href="{{ URL::route('categories.order', [$menucategoryChild->id, 'down']) }}" class="">↓</a>
                  

                 <span>&nbsp; {{$menucategoryChild->categoryName}} </span>
 {{ link_to_route('categories.menuitems.index', ' Manage Item', array( $menucategoryChild->id), array('class' => 'pull-right')) }}  
  {{ link_to_route('categories.menuitems.index', ' | ', array( $menucategoryChild->id), array('class' => 'pull-right')) }}  
                 {{ link_to_route('restaurant.menucategories.edit', 'Manage ', array($menucategory->restaurant_id, $menucategoryChild->id), array('class' => 'pull-right')) }} 
                 
             </li>
                   @endforeach
              
            </ul>
            </td>
            <td>{{ link_to_route('restaurant.menucategories.edit', 'Manage', array($menucategory->restaurant_id, $menucategory->id), array('class' => 'pull-right')) }} </td>
            <td>{{ link_to_route('categories.menuitems.index', 'Manage Item', array($menucategory->id), array('class' => 'pull-right')) }} </td>

            <td>{{ link_to_route('menucategories.createsubmenu', 'Add subcategory', array($menucategory->restaurant_id, $menucategory->id)) }}</td>
          </tr>
            
   @endforeach


          
        </tbody>
      </table>



    </div>

  </div>

@stop