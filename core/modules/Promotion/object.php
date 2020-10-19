<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\promotion;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "promotions";
		
		$this->properties = array(
			"id"         => "Number",
			"title" => "String",
			"params" => array(
				"startDate" => "String",
				"finishDate" => "String",
				"discountAmount" => "String",
				"isActive" => "String",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'promotion-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'title' => $this->object->title,
	               'startDate' => $this->object->params->startDate,
	               'finishDate' => $this->object->params->finishDate,
	               'discountAmount' => $this->object->params->discountAmount,
	               'isActive' => $this->object->params->isActive,
	            );
	            break;
	        default:
	            $oFS = array();
	            break;
	    }
		/* var_dump($oFS);
		exit(); */
	    return (object)$oFS;
	}
}

?>
