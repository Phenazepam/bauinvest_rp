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
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'liter-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'title' => $this->object->title,
	               'complex' => $this->object->complex,
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
