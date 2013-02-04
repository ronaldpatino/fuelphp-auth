<?php
use Orm\Model;

class Model_Articulo extends Model
{
	protected static $_properties = array(
		'id',
		'nombre',
		'periodista_id',
		'seccion_id',
        'pagina_id',
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

    protected static $_has_many = array(
        'fotos' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Foto',
            'key_to' => 'articulo_id',
            'cascade_save' => true,
            'cascade_delete' => true,
        )
    );

    protected static $_belongs_to  = array(
        'seccion' => array(
            'key_from' => 'seccion_id',
            'model_to' => 'Model_Seccion',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),

        'pagina' => array(
            'key_from' => 'pagina_id',
            'model_to' => 'Model_Pagina',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )

    );

    public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('nombre', 'Nombre', 'required|max_length[255]');
		$val->add_field('periodista_id', 'Periodista Id', 'required|valid_string[numeric]');
		$val->add_field('seccion_id', 'Seccion Id', 'required|valid_string[numeric]');

		return $val;
	}

}
