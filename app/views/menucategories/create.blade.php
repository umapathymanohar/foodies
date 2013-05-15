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
    <li>Add category</li>
  </ul>

  <div class="page-header">
   <h3>Add Category</h3>

 </div>
 {{Form::open(['route' => ['restaurant.menucategories.store', $restaurant_id], 'class' => 'form-horizontal']);}}
 {{ Form::hidden('restaurant_id', $restaurant_id) }}

 <div class="control-group">
  <label class="control-label inline">Parent ID</label>
  <div class="controls">

    <?php
    $categories = Menucategory::where('restaurant_id', '=', $restaurant_id)->where('parent_id', '=', 0)->lists('categoryName', 'id');
    ?>

    @if (!isset($category_id) )
    {{ Form::select('parent_id', array('0' => 'None') + $categories)}}

    @else

    {{ Form::select('parent_id', $categories, $category_id, array('class' => 'disabled'))}}

    @endif

  </div>
</div>



<div class="control-group">
 <label class="control-label">Title</label>
 <div class="controls">

   <input type="text" class="span7" name="categoryName" placeholder="">
 </div>
</div>
<div class="control-group">
 <label class="control-label">Description</label>
 <div class="controls">
   <textarea rows="5" name="categoryDescription" class="span7"></textarea>
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

    {{Form::select('categoryShow', array('yes' => 'Yes', 'no' => 'No'), 'yes');}}
  </div>
</div>




<hr>
<div class="control-group actions">
 <div class="controls">
   <a href=""   class="button">Cancel</a>
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


