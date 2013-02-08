<?php

namespace Fuel\Migrations;

class Create_ayudas
{
	public function up()
	{
		\DBUtil::create_table('ayudas', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'menu' => array('constraint' => 11, 'type' => 'int'),
			'titulo' => array('constraint' => 255, 'type' => 'varchar'),
			'video' => array('type' => 'text'),
			'descripcion' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('ayudas');
	}
}