@extends('layouts.scaffold')

@section('main')

<h1>Show RestaurantLocation</h1>

<p>{{ link_to_route('restaurants.restaurantlocations.index', 'Return to all restaurantLocations', $restaurantlocation->restaurant_id) }}</p>

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
        <tr>
            <td>{{ $restaurantlocation->restaurant_id }}</td>
					<td>{{ $restaurantlocation->restaurantPhone }}</td>
					<td>{{ $restaurantlocation->restaurantMobile }}</td>
					<td>{{ $restaurantlocation->restaurantEmail }}</td>
					<td>{{ $restaurantlocation->restaurantAddressLine1 }}</td>
					<td>{{ $restaurantlocation->restaurantAddressLine2 }}</td>
					<td>{{ $restaurantlocation->restaurantCity }}</td>
					<td>{{ $restaurantlocation->restaurantState }}</td>
					<td>{{ $restaurantlocation->restaurantCountry }}</td>
					<td>{{ $restaurantlocation->restaurantPincode }}</td>
					<td>{{ $restaurantlocation->restaurantWorkingHours }}</td>
                  		<td>{{ link_to_route('restaurants.restaurantlocations.edit', 'Edit', array($restaurantlocation->restaurant_id, $restaurantlocation->id), array('class' => 'btn btn-info')) }}</td>
            
            		<td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('restaurants.restaurantlocations.destroy', $restaurantlocation->restaurant_id, $restaurantlocation->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>  
        </tr>
    </tbody>
</table>

@stop