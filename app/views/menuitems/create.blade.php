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
          <li><a href="restaurant-detail.html">Restaurant name</a></li>
  <li><a href="category.html">Category</a> <span class="divider">/</span></li>
  <li>Items</li>
</ul>
     <h3 class="subheader">Add Item</h3>
       <div class="row">
         <div class="span10">
           
{{ Form::open(['route' => ['categories.menuitems.store', $categories_id], 'class'=>'form-horizontal']) }}

  {{ Form::hidden('category_id', $categories_id) }}
        
             <div class="control-group">
              <label class="control-label">Title</label>
              <div class="controls">
                    {{ Form::text('itemName') }}
                
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                {{ Form::textarea('itemDescription') }}
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Item Show</label>
              <div class="controls">
                {{            Form::select('itemShow', array('yes' => 'Yes', 'no' => 'No'), 'yes');}}
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


