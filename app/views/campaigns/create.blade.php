@extends('layouts.scaffold')

@section('main')

<h1>Create Campaign</h1>

{{ Form::open(array('route' => 'campaigns.store')) }}
	<ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('alias', 'Alias:') }}
            {{ Form::text('alias') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::input('number', 'type') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::input('number', 'status') }}
        </li>

        <li>
            {{ Form::label('published', 'Published:') }}
            {{ Form::input('number', 'published') }}
        </li>

        <li>
            {{ Form::label('outcome', 'Outcome:') }}
            {{ Form::input('number', 'outcome') }}
        </li>

        <li>
            {{ Form::label('starting_time', 'Starting_time:') }}
            {{ Form::text('starting_time') }}
        </li>

        <li>
            {{ Form::label('ending_time', 'Ending_time:') }}
            {{ Form::text('ending_time') }}
        </li>

        <li>
            {{ Form::label('duration', 'Duration:') }}
            {{ Form::text('duration') }}
        </li>

        <li>
            {{ Form::label('vote_qty', 'Vote_qty:') }}
            {{ Form::input('number', 'vote_qty') }}
        </li>

        <li>
            {{ Form::label('sale_qty', 'Sale_qty:') }}
            {{ Form::input('number', 'sale_qty') }}
        </li>

        <li>
            {{ Form::label('sale_value', 'Sale_value:') }}
            {{ Form::text('sale_value') }}
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


