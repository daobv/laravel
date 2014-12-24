@extends('layouts.scaffold')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('users.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Email</th>
				<th>Password</th>
				<th>Last_name</th>
				<th>First_name</th>
				<th>Power_message</th>
				<th>Logo</th>
				<th>Privacy</th>
				<th>Role_id</th>
				<th>Organization_id</th>
				<th>Remember_token</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $user->email }}}</td>
					<td>{{{ $user->password }}}</td>
					<td>{{{ $user->last_name }}}</td>
					<td>{{{ $user->first_name }}}</td>
					<td>{{{ $user->power_message }}}</td>
					<td>{{{ $user->logo }}}</td>
					<td>{{{ $user->privacy }}}</td>
					<td>{{{ $user->role_id }}}</td>
					<td>{{{ $user->organization_id }}}</td>
					<td>{{{ $user->remember_token }}}</td>
                    <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
