<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Partner;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "partners";
		
		$this->properties = array(
			"id"         => "Number",
			"params"     => array(
				"f" => "String",
				"i" => "String",
				"o" => "String",
				"phoneNumber" => "String",
				"email" => "String",
				"connectionToContract" => "String",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'partner-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'f' => $this->object->params->f,
	               'i' => $this->object->params->i,
	               'o' => $this->object->params->o,
	               'phoneNumber' => $this->object->params->phoneNumber,
	               'email' => $this->object->params->email,
	               'connectionToContract' => $this->object->params->connectionToContract,
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
