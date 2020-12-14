<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Liter;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "liter";
		
		$this->properties = array(
			"id"         => "Number",
			"title"      => "String",
			"complex"      => "String",
			"entrance"      => "String",
			"params"     => array(),
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
