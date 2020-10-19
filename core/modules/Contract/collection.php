<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Contract;

use \RedCore\Logger\Collection as Logger;
use \RedCore\Contract\Collection as Contract;
use \RedCore\Users\Collection as Users;
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
	public static function setObject($obj = "contract") {
		if("contract" == $obj) {
			self::$object = "contract";
			self::$sql    = Sql::$sqlContract;
			self::$class  = "RedCore\Contract\ObjectBase";
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
	public static function store($params = "") {
		//проверка права на редактирование
		if(array_key_exists("contract", $params)) {
			$lb_params = array(
				"id" => $params["contract"]["id"]
			);
			
			if($_tmp = self::loadBy($lb_params)) {
				$stage_status = $_tmp->object->params->stage_status;
				Users::setObject();
				$role = Users::getAuthRole();

				switch($role) {
					case 2:

						if((0 == $stage_status) OR (3 == $stage_status)) {
							$params["contract"]["params"]["stage_status"] = 1;
						}
						else {
							Controller::Redirect('error403');
						} 
				}
			}		
		}
		
		self::SetObject();
		return parent::store($params);
	}
}

?>
