<?php
use Orm\Model;

class Model_Foto extends Model
{
	protected static $_properties = array(
		'id',
		'imagen',
		'width',
		'height',
		'articulo_id',
		'dimension_id',
		'estado',
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

    protected static $_belongs_to  = array(
        'dimension' => array(
            'key_from' => 'dimension_id',
            'model_to' => 'Model_Dimension',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

    public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('imagen', 'Imagen', 'required');
		$val->add_field('width', 'Width', 'required|valid_string[numeric]');
		$val->add_field('height', 'Height', 'required|valid_string[numeric]');
		$val->add_field('articulo_id', 'Articulo Id', 'required|valid_string[numeric]');
		$val->add_field('dimension_id', 'Dimension Id', 'required|valid_string[numeric]');
		$val->add_field('estado', 'Estado', 'required|valid_string[numeric]');

		return $val;
	}

}
