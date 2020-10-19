<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\agency;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "agencies";
		
		$this->properties = array(
			"id"         => "Number",
			"title"      => "String",
			"params"     => array(
				"comName" => "String",
				"inn" => "Number",
				"paymentProcent" => "Number",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'agency-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'title' => $this->object->title,
	               'comName' => $this->object->params->comName,
	               'inn' => $this->object->params->inn,
	               'paymentProcent' => $this->object->params->paymentProcent,
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
