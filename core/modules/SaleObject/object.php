<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\SaleObject;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "saleobjects";
		
		$this->properties = array(
			"id"         => "Number",
			"params"      => array(
				"liter" => "String",
				"level" => "Number",
				"number" => "Number",
				"rooms" => "String",
				"spaceFull" => "Number",
				"spaceWithoutBalc" => "Number",
				"sqmtPrice" => "Number",
				"totalPrice" => "Number",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'saleobject-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'liter' => $this->object->params->liter,
	               'level' => $this->object->params->level,
	               'number' => $this->object->params->number,
	               'rooms' => $this->object->params->rooms,
	               'spaceFull' => $this->object->params->spaceFull,
	               'spaceWithoutBalc' => $this->object->params->spaceWithoutBalc,
	               'sqmtPrice' => $this->object->params->sqmtPrice,
	               'totalPrice' => $this->object->params->totalPrice,
	            );
	            break;
	        default:
	            $oFS = array();
	            break;
	    }
	    
	    return (object)$oFS;
	}
}

?>
