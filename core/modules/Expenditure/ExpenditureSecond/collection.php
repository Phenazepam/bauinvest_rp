<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\ExpenditureSecond;

use \RedCore\Logger\Collection as Logger;
use \RedCore\calculationform\Collection as calculationform;
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
	public static function setObject($obj = "expendituresecond") {
		if("expendituresecond" == $obj) {
			self::$object = "expendituresecond";
			self::$sql    = Sql::$sqlExpenditure;
			self::$class  = "RedCore\ExpenditureSecond\ObjectBase";
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

	/**
	 * @method \RedCore\Base\Collection loadBy()
	 *
	 * @return \RedCore\Users\ObjectBase Object
	 */
	public static function store($params = array()) {
		$pid = Session::get("filter_expenditurefirst_id");
		$params["expendituresecond"]['pid'] = $pid;
		// var_dump($params);
		
	    return parent::store($params);
	}


}

?>
