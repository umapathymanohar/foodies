@extends('layouts.scaffold')

@section('main')
<?php 
$restaurant_id=$menucategory->restaurant_id;
$categoryName = $menucategory->categoryName;

 $restaurantName = Restaurant::where('id', $menucategory->restaurant_id)->first()->restaurantName;
?>
<div class="row">
       @include('layouts.sidebar');
       <div class="span10">
        <ul class="breadcrumb">
           <li><a href="{{URL::route('restaurants.index')}}">Restaurants</a> <span class="divider">/</span></li>
          <li><a href="{{URL::route('restaurants.show', $restaurant_id)}}">{{$restaurantName}}</a><span class="divider">/</span></li>
           <li> {{ $categoryName }}</li>
        </ul>

        <div class="page-header">
         <h3>Edit Category</h3>
         
       </div>
        {{ Form::model($menucategory, array('method' => 'PATCH', 'route' => array('restaurant.menucategories.update', $menucategory->restaurant_id, $menucategory->id), 'class' => 'form-horizontal')) }}
        
        {{ Form::hidden('restaurant_id', $menucategory->restaurant_id) }}

             <div class="control-group">
      <label class="control-label inline">Parent ID</label>
      <div class="controls">
       
        <?php  $categories = Menucategory::where('parent_id', '=', 0)->lists('categoryName', 'id') ?>

            {{ Form::select('parent_id', array('0' => 'None') + $categories, $menucategory->parent_id)}}
  

  
     </div>
   </div>
 
  

        <div class="control-group">
         <label class="control-label">Title</label>
         <div class="controls">
                  
           
                       {{ Form::text('categoryName') }}
         </div>
       </div>
       <div class="control-group">
         <label class="control-label">Description</label>
         <div class="controls">
           <textarea rows="5" name="categoryDescription" class="span7"></textarea>
         </div>
       </div>
 
        <div class="control-group">
         <?php 

          $menuitemavailability = Menuitemavailability::where('available_id',  $menucategory->id)->where('available_type','Menucategory')->first();

 

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
         <input type="text" name="availableFrom" class="span3" placeholder="">
       </div>
     </div>
     <div class="control-group">
      <label class="control-label inline">To</label>
      <div class="controls">
       
       <input type="text" class="span3" name="availableTill" placeholder="">
     </div>
   </div>


        <div class="control-group">
      <label class="control-label inline">Show</label>
      <div class="controls">
       
    {{Form::select('categoryShow', array('yes' => 'Yes', 'no' => 'No'), $menucategory->categoryShow);}}
     </div>
   </div>
   

        
 
   <hr>
   <div class="control-group actions">
     <div class="controls">
      <a  href="{{URL::route('restaurant.menucategories.index', $restaurant_id)}}" class="button blue">Cancel</a>

{{ Form::open(array('method' => 'DELETE', 'route' => array('restaurant.menucategories.destroy', $menucategory->restaurant_id , $menucategory->id))) }}
{{ Form::submit('Delete', array('class' => 'button red')) }}
{{ Form::close() }}

      
      <button  type="submit" class="button blue">Submit</button>
    </div>
  </div>
</form>


</div>

</div>



 
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop
