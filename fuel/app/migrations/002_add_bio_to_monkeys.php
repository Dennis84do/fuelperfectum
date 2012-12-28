<?php

namespace Fuel\Migrations;

class Add_bio_to_monkeys
{
	public function up()
	{
		\DBUtil::add_fields('monkeys', array(
			'bio' => array('type' => 'text'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('monkeys', array(
			'bio'

		));
	}
}