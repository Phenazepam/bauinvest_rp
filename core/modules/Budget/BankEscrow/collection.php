<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\BankEscrow;

use \RedCore\Logger\Collection as Logger;
use \RedCore\Controller as Controller;
use \RedCore\Core as Core;
use \RedCore\Where as Where;
use RedCore\Session;
use \RedCore\BankEscrow\Collection as BankEscrow;

require_once('sql.php');
require_once('object.php');

class Collection extends \RedCore\Base\Collection { 
	
	/**
	 * @method \RedCore\Base\Collection setObject()
	 */
	public static function setObject($obj = "bankescrow") {
		if("bankescrow" == $obj) {
			self::$object = "bankescrow";
			self::$sql    = Sql::$sqlBankEscrow;
			self::$class  = "RedCore\BankEscrow\ObjectBase";
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
	


	public static function generate($params = array()) {
		// var_dump($_POST);
		$liter_id = Session::get("filter_liter_id");
		$points = $_POST;

		// var_dump($liter_id);

		foreach($points as $key => $item){
			$params["bankescrow"] = array(
				"liter_id" => $liter_id,
				"expenditure_id" =>$item,
				"budget" => 0,
				"paid" => 0,
				"rest" => 0
			);
			var_dump($params["bankescrow"]);
			parent::store($params);
		}
	    
		exit();
	}

	public static function store() {
		// $data = file_get_contents('php://input');
		$data = json_decode(file_get_contents('php://input'));

		$params["bankescrow"] = array(
			"id" => $data->id,							
			$data->type =>$data->value			
		);
		var_dump($params);
		parent::store($params);
		exit();
	}

	
}

?>
