@extends('layouts.scaffold')

@section('main')
<?php 
           $logged_in_user = Confide::user()->id;
           $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
           $category_id = Menuitem::where('id', '=', $menuitemimage->item_id)->first()->category_id;  
           $restaurant_id = Menucategory::where('id', '=', $category_id)->first()->restaurant_id;  
            $destinationPath = URL::asset('/business_assets/'.$business_id.'/restaurant/'.$restaurant_id. '/items');

?>
<h1>Edit Menuitemimage</h1>
{{ Form::model($menuitemimage, array('method' => 'PATCH', 'route' => array('item.images.update', $menuitemimage->item_id, $menuitemimage->id), 'files' => 'true')) }}
    <ul>
        <li>
            {{ Form::hidden('item_id', $menuitemimage->id) }}
        </li>

        <li>
            <img width="200" src="{{$destinationPath .'/'. $menuitemimage->itemImageName}}" alt="">
            {{ Form::label('itemImageName', 'ItemImageName:') }}
            {{ Form::file('itemImageName') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('item.images.show', 'Cancel', array($menuitemimage->item_id, $menuitemimage->id), array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop