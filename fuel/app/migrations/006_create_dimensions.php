<?php

namespace Fuel\Migrations;

class Create_dimensions
{
	public function up()
	{
		\DBUtil::create_table('dimensions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'descipcion' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('dimensions');
	}
}