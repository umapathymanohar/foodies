@extends('layouts.scaffold')

@section('main')

<h1>Edit RestaurantLocation</h1>
{{ Form::model($restaurantlocation, array('method' => 'PATCH', 'route' => array('restaurants.restaurantlocations.update', $restaurantlocation->restaurant_id, $restaurantlocation->id))) }}
    <ul>
        <li>

            {{ Form::hidden('restaurant_id') }}
        </li>

        <li>
            {{ Form::label('restaurantPhone', 'RestaurantPhone:') }}
            {{ Form::text('restaurantPhone') }}
        </li>

        <li>
            {{ Form::label('restaurantMobile', 'RestaurantMobile:') }}
            {{ Form::text('restaurantMobile') }}
        </li>

        <li>
            {{ Form::label('restaurantEmail', 'RestaurantEmail:') }}
            {{ Form::text('restaurantEmail') }}
        </li>

        <li>
            {{ Form::label('restaurantAddressLine1', 'RestaurantAddressLine1:') }}
            {{ Form::text('restaurantAddressLine1') }}
        </li>

        <li>
            {{ Form::label('restaurantAddressLine2', 'RestaurantAddressLine2:') }}
            {{ Form::text('restaurantAddressLine2') }}
        </li>

        <li>
            {{ Form::label('restaurantCity', 'RestaurantCity:') }}
            {{ Form::text('restaurantCity') }}
        </li>

        <li>
            {{ Form::label('restaurantState', 'RestaurantState:') }}
            {{ Form::text('restaurantState') }}
        </li>

        <li>
            {{ Form::label('restaurantCountry', 'RestaurantCountry:') }}
            {{ Form::text('restaurantCountry') }}
        </li>

        <li>
            {{ Form::label('restaurantPincode', 'RestaurantPincode:') }}
            {{ Form::text('restaurantPincode') }}
        </li>

        <li>
            {{ Form::label('restaurantWorkingHours', 'RestaurantWorkingHours:') }}
            {{ Form::text('restaurantWorkingHours') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        
            {{ link_to_route('restaurants.restaurantlocations.show', 'Cancel', array($restaurantlocation->restaurant_id, $restaurantlocation->id), array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop