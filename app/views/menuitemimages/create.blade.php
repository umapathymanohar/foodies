@extends('layouts.scaffold')

@section('main')

<h1>Create Menuitemimage</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, molestias, dicta, autem doloribus minus ipsa amet reiciendis itaque quisquam harum excepturi dolorum fugiat iste laudantium delectus magni id mollitia ipsum!</p>

{{ Form::open(['route' => ['item.images.store', $item_id], 'files' => 'true']) }}
    <ul>
        <li>
            
            {{ Form::hidden('item_id', $item_id) }}
        </li>

        <li>
            {{ Form::label('itemImageName', 'ItemImageName:') }}
            {{ Form::file('itemImageName[]', array('multiple')) }}
        </li>
<hr>
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


