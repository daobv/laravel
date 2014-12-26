@extends('layouts.scaffold')

@section('main')

<h1>All Campaigns</h1>

<p>{{ link_to_route('campaigns.create', 'Add new campaign') }}</p>

@if ($campaigns->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User_id</th>
				<th>Name</th>
				<th>Alias</th>
				<th>Description</th>
				<th>Type</th>
				<th>Status</th>
				<th>Published</th>
				<th>Outcome</th>
				<th>Starting_time</th>
				<th>Ending_time</th>
				<th>Duration</th>
				<th>Vote_qty</th>
				<th>Sale_qty</th>
				<th>Sale_value</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($campaigns as $campaign)
				<tr>
					<td>{{{ $campaign->user_id }}}</td>
					<td>{{{ $campaign->name }}}</td>
					<td>{{{ $campaign->alias }}}</td>
					<td>{{{ $campaign->description }}}</td>
					<td>{{{ $campaign->type }}}</td>
					<td>{{{ $campaign->status }}}</td>
					<td>{{{ $campaign->published }}}</td>
					<td>{{{ $campaign->outcome }}}</td>
					<td>{{{ $campaign->starting_time }}}</td>
					<td>{{{ $campaign->ending_time }}}</td>
					<td>{{{ $campaign->duration }}}</td>
					<td>{{{ $campaign->vote_qty }}}</td>
					<td>{{{ $campaign->sale_qty }}}</td>
					<td>{{{ $campaign->sale_value }}}</td>
                    <td>{{ link_to_route('campaigns.edit', 'Edit', array($campaign->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('campaigns.destroy', $campaign->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no campaigns
@endif

@stop
