<?php
use Orm\Model;

class Model_Ayuda extends Model
{
	protected static $_properties = array(
		'id',
		'menu',
		'titulo',
		'video',
		'descripcion',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('menu', 'Menu', 'required|valid_string[numeric]');
		$val->add_field('titulo', 'Titulo', 'required|max_length[255]');
		$val->add_field('video', 'Video', 'required');
		$val->add_field('descripcion', 'Descripcion', 'required');

		return $val;
	}

}
