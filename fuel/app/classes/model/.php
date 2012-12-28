<?php
class Model_ extends Model_Crud
{
	protected static $_table_name = 's';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);

		return $val;
	}

}
