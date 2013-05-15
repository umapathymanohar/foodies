@extends('layouts.scaffold')

@section('main')

<h1>Create Cuisine</h1>

{{ Form::open(['route' => 'cuisines.store']) }}
    <ul>
        <li>
            {{ Form::label('cuisineName', 'CuisineName:') }}
            {{ Form::text('cuisineName') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


