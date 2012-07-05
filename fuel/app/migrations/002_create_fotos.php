<?php

namespace Fuel\Migrations;

class Create_fotos
{
	public function up()
	{
		\DBUtil::create_table('fotos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'imagen' => array('type' => 'text'),
			'width' => array('constraint' => 11, 'type' => 'int'),
			'height' => array('constraint' => 11, 'type' => 'int'),
			'articulo_id' => array('constraint' => 11, 'type' => 'int'),
			'dimension_id' => array('constraint' => 11, 'type' => 'int'),
			'estado' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('fotos');
	}
}