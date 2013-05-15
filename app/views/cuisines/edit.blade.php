@extends('layouts.scaffold')

@section('main')

<h1>Edit Cuisine</h1>
{{ Form::model($cuisine, array('method' => 'PATCH', 'route' => array('cuisines.update', $cuisine->id))) }}
    <ul>
        <li>
            {{ Form::label('cuisineName', 'CuisineName:') }}
            {{ Form::text('cuisineName') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('cuisines.show', 'Cancel', $cuisine->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop