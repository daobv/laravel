<?php

class User extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'email' => 'required',
		'password' => 'required',
		'last_name' => 'required',
		'first_name' => 'required',
		'power_message' => 'required',
		'logo' => 'required',
		'privacy' => 'required',
		'role_id' => 'required',
		'organization_id' => 'required',
		'remember_token' => 'required'
	);
}
