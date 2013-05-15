@extends('layouts.scaffold')

@section('main')

<?php 
$restaurant = Menucategory::with('restaurant')->where('id', $menuitem->category_id)->first();
$restaurantName=$restaurant->restaurant->restaurantName;
$restaurant_id=$restaurant->restaurant->id;
?>

  <div class="row">
 @include('layouts.sidebar')
  <div class="span10">
      <ul class="breadcrumb">
<li><a href="{{URL::route('restaurants.show', $restaurant_id)}}">{{$restaurantName}}</a><span class="divider">/</span></li>
<li><a href="{{URL::route('restaurant.menucategories.index', array($restaurant_id))}}">{{$categoryName = Menucategory::with('restaurant')->where('id', $menuitem->category_id)->first()->categoryName;}}</a><span class="divider">/</span></li>
       <li>{{$menuitem->itemName}}</li>
</ul>
     <h3 class="subheader">Edit Item</h3>
       <div class="row">
         <div class="span10">
           

{{ Form::model($menuitem, array('method' => 'PATCH', 'route' => array('categories.menuitems.update', $menuitem->category_id, $menuitem->id))) }}
    
            {{ Form::hidden('category_id') }}
        
             <div class="control-group">
              <label class="control-label">Title</label>
              <div class="controls">
                    {{ Form::text('itemName') }}
                
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea style="height:50px;"  id="itemDescription" name="itemDescription"> </textarea>
                
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Item Show</label>
              <div class="controls">
                {{            Form::select('itemShow', array('yes' => 'Yes', 'no' => 'No'), 'yes');}}
              </div>
            </div>

            
<div class="control-group">
         <?php 

          $menuitemavailability = Menuitemavailability::where('available_id',  $menuitem->id)->where('available_type','Menuitem')->first();

 

         ?>
         <div class="controls">
           <label class="checkbox inline">
             {{ Form::checkbox('availMonday', $menuitemavailability->availMonday, $menuitemavailability->availMonday) }} Mon
             
           </label>
           <label class="checkbox inline">
               {{ Form::checkbox('availTuesday',$menuitemavailability->availTuesday, $menuitemavailability->availTuesday) }} Tue
           </label>
           <label class="checkbox inline">
             {{ Form::checkbox('availWednesday', $menuitemavailability->availWednesday, $menuitemavailability->availWednesday) }} Wed
           </label>

                      <label class="checkbox inline">
            {{ Form::checkbox('availThursday', $menuitemavailability->availThursday, $menuitemavailability->availThursday) }} Thu
           </label>


           <label class="checkbox inline">
              {{ Form::checkbox('availFriday',$menuitemavailability->availFriday, $menuitemavailability->availFriday) }} Fri
           </label>


           <label class="checkbox inline">
            {{ Form::checkbox('availSaturday',$menuitemavailability->availSaturday, $menuitemavailability->availSaturday) }} Sat
           </label>

            <label class="checkbox inline">
             {{ Form::checkbox('availSunday', $menuitemavailability->availSunday, $menuitemavailability->availSunday) }} Sun
           </label>


         </div>
       </div>


           <div class="control-group">
             <label class="control-label inline">From</label>
              <div class="controls">
                <input type="text" class="span3" placeholder="">
              </div>
              </div>
           <div class="control-group">
             <label class="control-label inline">To</label>
              <div class="controls">
              
                <input type="text" class="span3" placeholder="">
              </div>
              </div>
   
          <hr>
             <div class="control-group actions">
                <div class="controls">
                 <button href="#" class="button">Cancel</button>
                 <button type="submit" class="button blue">Submit</button>
               </div>
             </div>
          </form>
         </div>
       </div>
        
        
          </div>

</div>

@stop





@extends('layouts.scaffold')

@section('main')

<h1>Edit Menuitem</h1>
{{ Form::model($menuitem, array('method' => 'PATCH', 'route' => array('categories.menuitems.update', $menuitem->category_id, $menuitem->id))) }}

    <ul>
        <li>
            
            {{ Form::hidden('category_id') }}
        </li>

        <li>
            {{ Form::label('itemName', 'ItemName:') }}
            {{ Form::text('itemName') }}
        </li>

        <li>
            {{ Form::label('itemDescription', 'ItemDescription:') }}
            {{ Form::text('itemDescription') }}
        </li>

        <li>
            {{ Form::label('itemPrice', 'ItemPrice:') }}
            {{ Form::text('itemPrice') }}
        </li>

        <li>
            {{ Form::label('itemPosition', 'ItemPosition:') }}
            {{ Form::text('itemPosition') }}
        </li>

        <li>
            {{ Form::label('availableFrom', 'AvailableFrom:') }}
            {{ Form::text('availableFrom') }}
        </li>

        <li>
            {{ Form::label('availableTill', 'AvailableTill:') }}
            {{ Form::text('availableTill') }}
        </li>

        <li>
            {{ Form::label('itemShow', 'ItemShow:') }}
            {{Form::select('itemShow', array('yes' => 'Yes', 'no' => 'No'), $menuitem->itemShow);}}

        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('categories.menuitems.show', 'Cancel', array($menuitem->category_id, $menuitem->id), array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop