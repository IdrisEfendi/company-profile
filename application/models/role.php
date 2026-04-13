<?php

defined('DS') or exit('No direct access.');

class Role extends Facile
{
    public static $table = 'roles';
    public static $key = 'id';
    public static $timestamps = false;

    public function users()
	{

        return $this->has_many('User', 'role_id');
        
	}

    public function permissions()
	{

        return $this->has_many('Permission', 'role_id');
        
	}

}
