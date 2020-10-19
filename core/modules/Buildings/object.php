<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Buildings;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "buildings";
		
		$this->properties = array(
			"id"         => "Number",
			"complex"      => "String",
			"liter"      => "String",
			"entrance"      => "String",
			"params"     => array(
				"levels" => "Number",
			    "flatsOnLvl" => "Number",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'buildings-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'complex' => $this->object->complex,
	               'liter' => $this->object->liter,
	               'entrance' => $this->object->entrance,
	               'levels' => $this->object->params->levels,
	               'flatsOnLvl' => $this->object->params->flatsOnLvl,
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
