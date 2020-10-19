<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\mortgagebank;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "mortgagebanks";
		
		$this->properties = array(
			"id"         => "Number",
			"title"         => "String",
			"params"     => array(
				"inn" => "Number",
				"isActive" => "String",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'mortgagebank-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'title' => $this->object->title,
	               'inn' => $this->object->params->inn,
	               'isActive' => $this->object->params->isActive,
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
