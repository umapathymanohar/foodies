@extends('layouts.scaffold')

@section('main')

<h1>All Menuitemimages</h1>

<p>{{ link_to_route('item.images.create', 'Add new menuitemimage', $item_id) }}</p>

@if ($menuitemimages->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Item_id</th>
				<th>ItemImageName</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($menuitemimages as $menuitemimage)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no menuitemimages
@endif

@stop