<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Cartalyst\Sentry\Users\Eloquent\User as CartalystUser;

class User extends CartalystUser {

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

    protected $fillable = array('first_name', 'last_name', 'email', 'password');

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public static $loginRules = array
    (
        'email' => 'required|email',
        'password' => 'required'
    );

    public static $loginMessages = array
    (
        'email.email' => 'El formato del correo electrónico es incorrecto',
        'email.required' => 'El campo del correo electrónico es obligatorio',
        'password.required' => 'El campo de la contraseña es obligatorio',
    );

    public static $editRules = array
    (
        'first_name' => 'required'
    );

    public static $editMessages = array
    (
        'first_name.required' => 'El campo nombre es obligatorio'
    );
}
