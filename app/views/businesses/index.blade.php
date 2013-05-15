@extends('layouts.scaffold')

@section('main')

 <div class="row">
        <div class="span2">
          <div id="sidebar">
            <ul class="admin-list">
              <li class="active">
               <a href="business.html">Business</a>
             </li>
             <li><a href="profile.html">Profile</a></li>
           </ul>
         </div>
       </div>
       <div class="span10">
        <ul class="breadcrumb">
          <li>Business</li>
        </ul>
        <div class="row-fluid">
          <ul class="unstyled">
           <li class="span3">
            <div class="grid-box add">
             <h2>
<a href="{{URL::route('businesses.create')}}"><i class="icon-plus"></i>Business</a>
 </h2>
           </div>
         </li>

         @if ($businesses->count())

             @foreach ($businesses as $business)
        
              
         <li class="span3">
          <div class="grid-box">
            <div class="business-photo">
        <?php
              $logged_in_user = Confide::user()->id;
              $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
              $business_id = $business->id;
        ?>
             
            @if ($business->businessLogo)
            <a href="business-detail.html">
            <img width="200" src="{{URL::asset('/business_assets/'.$business_id. '/' . $business->businessLogo )}}" alt="">
            </a>
            @endif
            </div>
            <h3 class="res-title">{{$business->businessName}}</h3>
            
            <p>
              {{ link_to_route('businesses.edit', 'Manage', array($business->id)) }}
              |
              {{ link_to_route('restaurant.menucategories.index', 'Create Menu',  array($business->id)) }}
                
<!--                 | 

                 {{ Form::open(array('method' => 'DELETE', 'route' => array('businesses.destroy', $business->id))) }}
                 <button type="submit">Delete</button>
                            
 -->
                </p>
          </div>
        </li>

         @endforeach

         @else
    There are no businesses
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

 

<h1>All Businesses</h1>

<p>{{ link_to_route('businesses.create', 'Add new business') }}</p>

@if ($businesses->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User_id</th>
				<th>FullName</th>
				<th>BusinessName</th>
				<th>BusinessLogo</th>
				<th>BusinessState</th>
				<th>BusinessCity</th>
				<th>BusinessPincode</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($businesses as $business)
                <tr>
                    <td>{{ $business->user_id }}</td>
					<td>{{ $business->fullName }}</td>
					<td>{{ $business->businessName }}</td>
					<td>{{ $business->businessLogo }}</td>
					<td>{{ $business->businessState }}</td>
					<td>{{ $business->businessCity }}</td>
					<td>{{ $business->businessPincode }}</td>

                    <td>{{ link_to_route('businesses.edit', 'Edit', array($business->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('businesses.destroy', $business->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no businesses
@endif

@stop