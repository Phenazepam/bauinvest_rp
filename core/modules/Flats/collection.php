<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Flats;

use \RedCore\Logger\Collection as Logger;
use \RedCore\Controller as Controller;
use \RedCore\Flats\Collection as Flats;
use \RedCore\Buildings\Collection as Buildings;
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
	
	/**
	 * @method \RedCore\Base\Collection store()
	 *
	 * @return \RedCore\Users\ObjectBase ObjectBase
	 */
	public static function store($params = "") {
		/* var_dump($_REQUEST);
		exit(); */
	    return parent::store($params);
	}


	public static function copyvertical($params= "") {
		//var_dump($params["flat"]);
	    if(array_key_exists("flat", $params)){
			$lb_params = array(
				"id" => $params["flat"]["id"]
			);
			
			if($_tmp = self::loadBy($lb_params)) {
				//var_dump($_tmp->object->id_b);
				$lb_params_b = array(
					"id" => $_tmp->object->id_b,
				);
				//var_dump($_tmp->object);
				Buildings::setObject("building");
				$Buildings = Buildings::loadBy($lb_params_b);
				$y = $Buildings->object->params->levels;
				Flats::setObject("flat");
				
				$id_b = Session::get("filter_building_id");

				$where = Where::Cond()
					->add("id_b", "=", $id_b)
					->add('and')
					->add("_deleted", "=", "0")
					->parse();
				$flats = Flats::getList($where);
				$existingFlats = array();
				foreach($flats as $key => $flat) {
					//print_r($flat);
					$existingFlats[$flat->object->id]["x"] = $flat->object->x;
					$existingFlats[$flat->object->id]["y"] = $flat->object->y;
				}
				$count=0;
				//print_r($existingFlats);
				for ($i=1; $i <= $y; $i++) {
					$existance = false;
					
					foreach($existingFlats as $ef){
						if($ef["y"] == $i){
							$existance = true;
						break;
						}
					}
						
					if(!$existance){
						$params["flat"] = array(
							"id_b" =>$_tmp->object->id_b,
							"x" =>$_tmp->object->x,
							"y" =>(string)$i,
							"params"=> array(					
								"number"=>$_tmp->object->params->number,						
								"rooms"=>$_tmp->object->params->rooms,						
								"spaceFull"=>$_tmp->object->params->spaceFull,					
								"spaceWithoutBalc"=>$_tmp->object->params->spaceWithoutBalc,					
								"sqmtPrice"=>$_tmp->object->params->sqmtPrice,				
								"totalPrice"=>$_tmp->object->params->totalPrice,				
								"flatStatus"=>$_tmp->object->params->flatStatus,								
							)
						);
						Flats::store($params);
					}
									
				}
			}		
		}
	}
	
	

	public static function Report(){
		$file = "flats_report.xls";
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		require_once('flats.report.php');

	}

}
