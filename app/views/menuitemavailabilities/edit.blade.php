@extends('layouts.scaffold')

@section('main')

<h1>Edit Menuitemavailability</h1>
{{ Form::model($menuitemavailability, array('method' => 'PATCH', 'route' => array('section.availablility.update', $menuitemavailability->id, $menuitemavailability->available_id))) }}
    <ul>
        <li>
            

              {{ Form::checkbox('availMonday', $menuitemavailability->availMonday) }} Monday
        </li>

        <li>
 
            {{ Form::checkbox('availTuesday',$menuitemavailability->availTuesday) }} Tuesday
        </li>

        <li>
            
            {{ Form::checkbox('availWednesday', $menuitemavailability->availWednesday) }} Wednesday
        </li>

        <li>
            
            {{ Form::checkbox('availThursday', $menuitemavailability->availThursday) }} Thursday
        </li>

        <li>
            
            {{ Form::checkbox('availFriday',$menuitemavailability->availFriday) }} Friday
        </li>

        <li>
            
            {{ Form::checkbox('availSaturday',$menuitemavailability->availSaturday) }} Saturday
        </li>

        <li>
            
            {{ Form::checkbox('availSunday', $menuitemavailability->availSunday) }} Sunday
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
           
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop