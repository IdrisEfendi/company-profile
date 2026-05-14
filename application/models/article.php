<?php

defined('DS') or exit('No direct access.');

class Article extends Facile
{
    public static $table = 'articles';
    public static $key = 'id';
    public static $timestamps = false;

    public function media()
	{
		return $this->belongs_to('Media', 'image_id');
	}
}
