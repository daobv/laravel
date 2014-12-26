@extends('layouts.scaffold')

@section('main')

<h1>Show Tweet</h1>

<p>{{ link_to_route('tweets.index', 'Return to all tweets') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
				<th>Content</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tweet->title }}}</td>
					<td>{{{ $tweet->content }}}</td>
                    <td>{{ link_to_route('tweets.edit', 'Edit', array($tweet->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tweets.destroy', $tweet->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
