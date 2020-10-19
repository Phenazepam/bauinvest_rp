<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Contract;

class ObjectBase extends \RedCore\Base\ObjectBase {
	
	public static function Create() {
	    return new ObjectBase();
	}
	
	public function __construct() {
		$this->table = "contracts";
		
		$this->properties = array(
			"id"         => "Number",
			"params"     => array(
				"accountingEntity" => "String",
				"contractNumber" => "Number",
				"contractDate" => "StringString",
				"creationDate" => "String",
				"registrationDate" => "String",
				"saleType" => "String",
				"contractTypes" => "String",
				"contractStatus" => "String",
				"contractPrice" => "Number",
				"rosFinMon" => "Number",
				"NDS" => "Number",
				"agency" => "String",
				"realtorReward" => "Number",
				"promotion" => "String",
				"calculationForm" => "String",
				"mortgageBank" => "String",
				"paymentSchedule" => "String",
				"saleObject" => "String",
				"facingType" => "String",
				"stage_status" => "Number",
			),
		    "_deleted" => "Number",
		);
	}
	
	public function getFieldSet($name = "") {
	    $oFS = array();
	    
	    switch ($name) {
	        case 'contract-list':
	            $oFS = array(
	               'id' => $this->object->id,
	               'accountingEntity' => $this->object->params->accountingEntity,
	               'contractNumber' => $this->object->params->contractNumber,
	               'contractDate' => $this->object->params->contractDate,
	               'creationDate' => $this->object->params->creationDate,
	               'registrationDate' => $this->object->params->registrationDate,
	               'saleType' => $this->object->params->saleType,
	               'contractTypes' => $this->object->params->contractTypes,
	               'contractStatus' => $this->object->params->contractStatus,
	               'contractPrice' => $this->object->params->contractPrice,
	               'rosFinMon' => $this->object->params->rosFinMon,
	               'NDS' => $this->object->params->NDS,
	               'agency' => $this->object->params->agency,
	               'realtorReward' => $this->object->params->realtorReward,
	               'promotion' => $this->object->params->promotion,
	               'calculationForm' => $this->object->params->calculationForm,
	               'mortgageBank' => $this->object->params->mortgageBank,
	               'paymentSchedule' => $this->object->params->paymentSchedule,
	               'saleObject' => $this->object->params->saleObject,
				   'facingType' => $this->object->params->facingType,
				   'stage_status' => $this->object->params->stage_status,
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
