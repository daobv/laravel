<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Users extends Eloquent implements UserInterface, RemindableInterface{
    use UserTrait, RemindableTrait;
    protected $table = 'users';
    protected $primaryKey = 'id';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password','remember_token');
	protected $guarded = array();
	public static $rules = array(
		'email' => 'required',
		'password' => 'required',
		'last_name' => 'required',
		'first_name' => 'required',
		//'power_message' => 'required',
		//'logo' => 'required',
		//'privacy' => 'required',
		//'role_id' => 'required',
		//'organization_id' => 'required',
	//	'remember_token' => 'required'
	);
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(){
        return $this->password;
    }
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier(){
        return $this->getKey();
    }
    public function getRememberTokenName(){
        return "remember_token";
    }
    public function getRememberToken(){
        return $this->remember_token;
    }
    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
    public function setRememberToken($value){
        $this->remember_token = $value;
    }
}
