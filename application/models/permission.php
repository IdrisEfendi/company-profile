<?php

defined('DS') or exit('No direct access.');

class Permission extends Facile
{
    public static $table = 'permissions';
    public static $key = 'id';
    public static $timestamps = false;

    public function menu()
	{
		return $this->belongs_to('Menu', 'menu_id');
	}

}
