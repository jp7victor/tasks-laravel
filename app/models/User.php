<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	//addcreate
	protected $fillable = ['username', 'password', 'email'];

	public static $rules = [
		
		'username' => 'required',
		'password' => 'required',
		'email' => 'required'

	];
	//addcreate

	public static $errors;



	//addcreate
	public  function isValid()

	{

		$validation = Validator::make($this->attributes, static::$rules);

		if ($validation->passes()) return true;

		
		$this->errors = $validation->messages();

		return false;

	}
	//addcreate	


	public function setPasswordAttribute($value)
	{

		$this->attributes['password'] = Hash::make($value);	

	}


	public function tasks()
	{

		return $this->hasMany('Task');
		
	}

	public static function byUsername($username)
	{

		return static::whereUsername($username)->first();
	
	}
}



