<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Expenditure;

use \RedCore\Logger\Collection as Logger;
use \RedCore\Expenditure\Collection as Expenditure;
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
	public static function setObject($obj = "expenditure") {
		if("expenditure" == $obj) {
			self::$object = "expenditure";
			self::$sql    = Sql::$sqlExpenditure;
			self::$class  = "RedCore\Expenditure\ObjectBase";
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
	 * @method \RedCore\Base\Collection store()
	 *
	 * @return \RedCore\Users\ObjectBase Object
	 */
	public static function store($params = array()) {
		// var_dump($params);
		$pid = $params["expenditure"]["pid"]; 

	    $where = Where::Cond()
		->add("_deleted", "=", "0")
		->add("and")
		->add("pid", "=", $pid)
		->parse();
		$max_sort=0;
		$items = Expenditure::getList($where);
		foreach($items as $i){
			if($i->object->sort > $max_sort){
				$max_sort = $i->object->sort;
			}
		}
		$params["expenditure"]["sort"] = $max_sort +1;
		parent::store($params);
	}
	


}

?>
