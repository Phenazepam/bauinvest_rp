<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Buildings;

class Sql {
	public static 
	   $sqlBuildings = '
			SELECT
				id,
				complex,
				liter,
				entrance,
				params,
                _deleted
			FROM
				bauinvest__buildings
		';
	

}