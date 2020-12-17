<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Expenditure;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "expenditure";
		
		$this->properties = array(
			"id"         => "Number",
			"title"		 => "String",
			"pid"		 => "Number",
			"sort"		 => "Number",
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'expenditure-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'title' => $this->object->title,
	               'pid' => $this->object->pid,
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
