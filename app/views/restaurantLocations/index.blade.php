@extends('layouts.scaffold')

@section('main')

<h1>All RestaurantLocations</h1>

<p>{{ link_to_route('restaurants.restaurantlocations.create', 'Add new restaurantLocation', $restaurant_id) }}</p>

@if ($restaurantlocations->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Restaurant_id</th>
				<th>RestaurantPhone</th>
				<th>RestaurantMobile</th>
				<th>RestaurantEmail</th>
				<th>RestaurantAddressLine1</th>
				<th>RestaurantAddressLine2</th>
				<th>RestaurantCity</th>
				<th>RestaurantState</th>
				<th>RestaurantCountry</th>
				<th>RestaurantPincode</th>
				<th>RestaurantWorkingHours</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($restaurantlocations as $restaurantLocation)
                <tr>
                    <td>{{ $restaurantLocation->restaurant_id }}</td>
					<td>{{ $restaurantLocation->restaurantPhone }}</td>
					<td>{{ $restaurantLocation->restaurantMobile }}</td>
					<td>{{ $restaurantLocation->restaurantEmail }}</td>
					<td>{{ $restaurantLocation->restaurantAddressLine1 }}</td>
					<td>{{ $restaurantLocation->restaurantAddressLine2 }}</td>
					<td>{{ $restaurantLocation->restaurantCity }}</td>
					<td>{{ $restaurantLocation->restaurantState }}</td>
					<td>{{ $restaurantLocation->restaurantCountry }}</td>
					<td>{{ $restaurantLocation->restaurantPincode }}</td>
					<td>{{ $restaurantLocation->restaurantWorkingHours }}</td>
              		
              		<td>{{ link_to_route('restaurants.restaurantlocations.edit', 'Edit', array($restaurantLocation->restaurant_id, $restaurantLocation->id), array('class' => 'btn btn-info')) }}</td>
            
            		<td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('restaurants.restaurantlocations.destroy', $restaurantLocation->restaurant_id, $restaurantLocation->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>        

                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no restaurantLocations
@endif

@stop


