<?php

defined('DS') or exit('No direct access.');

class Label extends Facile
{
    public static $table = 'labels';
    public static $key = 'id';
    public static $timestamps = false;

    public function menus()
	{

        return $this->has_many('Menu', 'label_id');

	}

}
