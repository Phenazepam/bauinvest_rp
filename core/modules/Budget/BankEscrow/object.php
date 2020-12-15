<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\BankEscrow;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "bankescrow";
		
		$this->properties = array(
			"id"         => "Number",
			"liter_id"      => "Number",
			"expenditure_id"      => "Number",
			"params"     => array(
				"budget" => "Number",
			    "paid" => "Number",
			    "rest" => "Number",
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
	               'liter_id' => $this->object->liter_id,
	               'expenditure_id' => $this->object->expenditure_id,
	               'budget' => $this->object->params->budget,
	               'paid' => $this->object->params->paid,
	               'rest' => $this->object->params->rest,
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
