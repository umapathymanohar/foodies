@extends('layouts.scaffold')

@section('main')

<h1>Show Business</h1>

<p>{{ link_to_route('businesses.index', 'Return to all businesses') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>User_id</th>
				<th>FullName</th>
				<th>BusinessName</th>
				<th>BusinessLogo</th>
				<th>BusinessCurrency</th>
				<th>BusinessTimeZone</th>
				<th>BusinessAddressLine1</th>
				<th>BusinessAddressLine2</th>
				<th>BusinessCountry</th>
				<th>BusinessState</th>
				<th>BusinessCity</th>
				<th>BusinessPincode</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $business->user_id }}</td>
					<td>{{ $business->fullName }}</td>
					<td>{{ $business->businessName }}</td>
					<td>{{ $business->businessLogo }}</td>
					<td>{{ $business->businessCurrency }}</td>
					<td>{{ $business->businessTimeZone }}</td>
					<td>{{ $business->businessAddressLine1 }}</td>
					<td>{{ $business->businessAddressLine2 }}</td>
					<td>{{ $business->businessCountry }}</td>
					<td>{{ $business->businessState }}</td>
					<td>{{ $business->businessCity }}</td>
					<td>{{ $business->businessPincode }}</td>
                    <td>{{ link_to_route('businesses.edit', 'Edit', array($business->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('businesses.destroy', $business->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop