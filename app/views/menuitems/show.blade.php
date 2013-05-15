@extends('layouts.scaffold')

@section('main')

<h1>Show Menuitem</h1>

<p>{{ link_to_route('categories.menuitems.index', 'Return to all menuitems', $category_id) }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Category_id</th>
				<th>ItemName</th>
				<th>ItemDescription</th>
				<th>ItemPrice</th>
				<th>ItemPosition</th>
				<th>AvailableFrom</th>
				<th>AvailableTill</th>
				<th>ItemShow</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $menuitem->category_id }}</td>
					<td>{{ $menuitem->itemName }}</td>
					<td>{{ $menuitem->itemDescription }}</td>
					<td>{{ $menuitem->itemPrice }}</td>
					<td>{{ $menuitem->itemPosition }}</td>
					<td>{{ $menuitem->availableFrom }}</td>
					<td>{{ $menuitem->availableTill }}</td>
					<td>{{ $menuitem->itemShow }}</td>
                    <td>{{ link_to_route('categories.menuitems.edit', 'Edit', array($menuitem->category_id, $menuitem->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('categories.menuitems.destroy', $menuitem->category_id, $menuitem->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop