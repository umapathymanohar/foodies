@extends('layouts.scaffold')

@section('main')

<h1>Show Menuitemimage</h1>

<p>{{ link_to_route('item.images.index', 'Return to all menuitemimages', $menuitemimage->item_id) }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Item_id</th>
				<th>ItemImageName</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $menuitemimage->item_id }}</td>
					<td>{{ $menuitemimage->itemImageName }}</td>
                     <td>{{ link_to_route('item.images.edit', 'Edit', array($menuitemimage->item_id, $menuitemimage->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('item.images.destroy', $menuitemimage->item_id, $menuitemimage->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop