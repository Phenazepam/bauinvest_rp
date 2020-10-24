<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Flats;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "flats";
		
		$this->properties = array(
			"id"         => "Number",
			"id_b"         => "Number",
			"x"      => "Number",
			"y"      => "Number",
			"params"     => array(
				"number" => "Number",
				"rooms" => "String",
				"spaceFull" => "Number",
				"spaceWithoutBalc" => "Number",
				"sqmtPrice" => "Number",
				"totalPrice" => "Number",
				"flatStatus" => "String",
				"img" => "String",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'flats-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'id_b' => $this->object->id_b,
	               'x' => $this->object->x,
	               'y' => $this->object->y,
	               'number' => $this->object->params->number,
	               'rooms' => $this->object->params->rooms,
	               'spaceFull' => $this->object->params->spaceFull,
	               'spaceWithoutBalc' => $this->object->params->spaceWithoutBalc,
	               'sqmtPrice' => $this->object->params->sqmtPrice,
	               'totalPrice' => $this->object->params->totalPrice,
	               'flatStatus' => $this->object->params->flatStatus,
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
