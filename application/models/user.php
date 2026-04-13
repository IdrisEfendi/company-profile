<?php

defined('DS') or exit('No direct access.');

class User extends Facile
{
    public static $table = 'users';

    public static $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    public static $hidden = [
        'password',
    ];

    public $with = ['media', 'role', 'role.permissions'];

    public function role()
	{
		return $this->belongs_to('Role', 'role_id');
	}

    public function media()
	{
		return $this->belongs_to('Media', 'image_id');
	}
}
