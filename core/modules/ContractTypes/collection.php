<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\ContractTypes;

use \RedCore\Logger\Collection as Logger;
use \RedCore\Contracttypes\Collection as Contracttypes;
use \RedCore\Controller as Controller;
use \RedCore\Core as Core;
use \RedCore\Where as Where;
use RedCore\Session;

require_once('sql.php');
require_once('object.php');

class Collection extends \RedCore\Base\Collection { 
		
	/**
	 * @method \RedCore\Base\Collection setObject()
	 */
	public static function setObject($obj = "contracttype") {
		if("contracttype" == $obj) {
			self::$object = "contracttype";
			self::$sql    = Sql::$sqlContracttypes;
			self::$class  = "RedCore\ContractTypes\ObjectBase";
		}
	}
	
	/**
	 * @method \RedCore\Base\Collection loadBy()
	 *
	 * @return \RedCore\Users\ObjectBase Object
	 */
	public static function loadBy($params = array()) {
	    return parent::loadBy($params);
	}
	
	/**
	 * @method \RedCore\Base\Collection loadBy()
	 *
	 * @return \RedCore\Users\ObjectBase Object
	 */
	public static function getList($where = "") {
	    return parent::getList($where);
	}
	
}

?>
