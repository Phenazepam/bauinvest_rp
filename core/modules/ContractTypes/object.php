<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\ContractTypes;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "contracttypes";
		
		$this->properties = array(
			"id"         => "Number",
			"title"		 => "String",
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'contracttype-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'title' => $this->object->title,
	            );
	            break;
	        case 'partner-form-list':
	            $oFS = array(
	            'id' => $this->object->id,
	            'title' => $this->object->title,
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
