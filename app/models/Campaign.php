<?php

class Campaign extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'name' => 'required',
		'alias' => 'required',
		'description' => 'required',
		'type' => 'required',
		'status' => 'required',
		'published' => 'required',
		'outcome' => 'required',
		'starting_time' => 'required',
		'ending_time' => 'required',
		'duration' => 'required',
		'vote_qty' => 'required',
		'sale_qty' => 'required',
		'sale_value' => 'required'
	);
}
