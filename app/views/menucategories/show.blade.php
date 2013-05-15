@extends('layouts.scaffold')

@section('main')

<h1>Show Menucategory</h1>

<p>{{ link_to_route('restaurant.menucategories.index', 'Return to all menucategories', $menucategory->restaurant_id) }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Restaurant_id</th>
				<th>CategoryName</th>
				<th>CategoryDescription</th>
				<th>CategoryPosition</th>
				<th>AvailableFrom</th>
				<th>AvailableTill</th>
				<th>CategoryShow</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $menucategory->restaurant_id }}</td>
					<td>{{ $menucategory->categoryName }}</td>
					<td>{{ $menucategory->categoryDescription }}</td>
					<td>{{ $menucategory->categoryPosition }}</td>
					<td>{{ $menucategory->availableFrom }}</td>
					<td>{{ $menucategory->availableTill }}</td>
					<td>{{ $menucategory->categoryShow }}</td>
                    <td>{{ link_to_route('restaurant.menucategories.edit', 'Edit', array($menucategory->restaurant_id, $menucategory->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('restaurant.menucategories.destroy', $menucategory->restaurant_id , $menucategory->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop