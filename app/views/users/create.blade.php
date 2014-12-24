@extends('layouts.scaffold')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store')) }}
	<ul>
        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </li>

        <li>
            {{ Form::label('last_name', 'Last_name:') }}
            {{ Form::text('last_name') }}
        </li>

        <li>
            {{ Form::label('first_name', 'First_name:') }}
            {{ Form::text('first_name') }}
        </li>

        <li>
            {{ Form::label('power_message', 'Power_message:') }}
            {{ Form::text('power_message') }}
        </li>

        <li>
            {{ Form::label('logo', 'Logo:') }}
            {{ Form::text('logo') }}
        </li>

        <li>
            {{ Form::label('privacy', 'Privacy:') }}
            {{ Form::textarea('privacy') }}
        </li>

        <li>
            {{ Form::label('role_id', 'Role_id:') }}
            {{ Form::input('number', 'role_id') }}
        </li>

        <li>
            {{ Form::label('organization_id', 'Organization_id:') }}
            {{ Form::input('number', 'organization_id') }}
        </li>

        <li>
            {{ Form::label('remember_token', 'Remember_token:') }}
            {{ Form::text('remember_token') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


