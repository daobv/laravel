<?php

class Tweet extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'content' => 'required'
	);
}
