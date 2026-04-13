<?php

defined('DS') or exit('No direct access.');

class Media extends Facile
{
    public static $table = 'medias';
    public static $key = 'id';
    public static $timestamps = false;

    public function user()
	{
		return $this->belongs_to('User', 'user_id');
	}

}
