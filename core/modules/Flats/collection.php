<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Flats;

use \RedCore\Logger\Collection as Logger;
use \RedCore\Controller as Controller;
use \RedCore\Core as Core;
use \RedCore\Where as Where;
use RedCore\Session;

require_once('sql.php');
require_once('object.php');

class Collection extends \RedCore\Base\Collection { 
	
	/* public static $rooms = array(
		"0" => "Не выбрана",
		
	    "1" => "Студия",
		"2" => "1 комнатная",
	    "3" => "2х комнатная",
	    "4" => "3х комнатная",
	    "5" => "4х комнатная",
	); */
	
	/**
	 * @method \RedCore\Base\Collection setObject()
	 */
	public static function setObject($obj = "flat") {
		if("flat" == $obj) {
			self::$object = "flat";
			self::$sql    = Sql::$sqlFlats;
			self::$class  = "RedCore\Flats\ObjectBase";
		}
	}
	
	/**
	 * @method \RedCore\Base\Collection loadBy()
	 *
	 * @return \RedCore\Users\ObjectBase ObjectBase
	 */
	public static function loadBy($params = array()) {
	    return parent::loadBy($params);
	}
	
	/**
	 * @method \RedCore\Base\Collection getList()
	 *
	 * @return \RedCore\Users\ObjectBase ObjectBase
	 */
	public static function getList($where = "") {
	    return parent::getList($where);
	}
	
}

?>
