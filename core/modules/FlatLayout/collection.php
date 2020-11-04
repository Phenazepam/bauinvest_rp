<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\FlatLayout;

use \RedCore\Logger\Collection as Logger;
use \RedCore\saletype\Collection as saletype;
use \RedCore\Controller as Controller;
use \RedCore\Core as Core;
use \RedCore\Where as Where;
use RedCore\Session;

//require_once('sql.php');
//require_once('object.php');

class Collection extends \RedCore\Base\Collection { 
	
	
	/**
	 * @method \RedCore\Base\Collection setObject()
	 */
	public static function setObject($obj = "flatLayout") {
		if("flatLayout" == $obj) {
			self::$object = "flatLayout";
			//self::$sql    = Sql::$sqlsaletype;
			self::$class  = "RedCore\FlatLayout\ObjectBase";
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

	public static function getListImages() {
		$images = array_diff(scandir("../images/flat_plans"), array('..', '.'));
	    return $images;
	}

}

?>
