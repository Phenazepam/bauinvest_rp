<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\ExpenditureThird;

use \RedCore\Logger\Collection as Logger;
use \RedCore\ExpenditureThird\Collection as ExpenditureThird;
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
	public static function setObject($obj = "expenditurethird") {
		if("expenditurethird" == $obj) {
			self::$object = "expenditurethird";
			self::$sql    = Sql::$sqlExpenditure;
			self::$class  = "RedCore\ExpenditureThird\ObjectBase";
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
		$pid = Session::get("filter_expendituresecond_id");
		$params["expenditurethird"]['pid'] = $pid;
		// var_dump($params);
		
	    return parent::store($params);
	}


}

?>
