@extends('layouts.scaffold')

@section('main')

<h1>Show Cuisine</h1>

<p>{{ link_to_route('cuisines.index', 'Return to all cuisines') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>CuisineName</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $cuisine->cuisineName }}</td>
                    <td>{{ link_to_route('cuisines.edit', 'Edit', array($cuisine->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('cuisines.destroy', $cuisine->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop