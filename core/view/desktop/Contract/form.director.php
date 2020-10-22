<?php 
	use RedCore\accountingentity\Collection as AccountingEntity;
	use RedCore\saletype\Collection as SaleType;
	use RedCore\ContractTypes\Collection as ContractTypes;
	use RedCore\contractstatus\Collection as ContractStatus;
	use RedCore\agency\Collection as Agency;
	use RedCore\promotion\Collection as Promotion;
	use RedCore\CalculationForm\Collection as CalculationForm;
	use RedCore\mortgagebank\Collection as MortgageBank;
	use RedCore\Facingtypes\Collection as FacingType;
	use RedCore\Flats\Collection as Flats;
	use RedCore\Buildings\Collection as Buildings;
	use RedCore\Users\Collection as Users;

	use RedCore\Contract\Collection as Contract;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;
	use RedCore\Session as Session;


	
	$html_object = "contract";
	$lb_params = array(
		"id" => Request::vars("contract_id"),
	);
	Contract::setObject("contract");
	$item = Contract::loadBy($lb_params);
	$item = $item->object;
	

	
	/* ContractTypes::setObject();
	$items_ct = ContractTypes::getList();
	
	$contract_type_list["list"] = array(
	    "0" => "Не выбран",
	);
	
	foreach($items_ct as $key => $item) {
	    $contract_type_list["list"][$key] = $item->getFieldSet("partner-form-list")->title;
	} */

	//AccountingEntity
	AccountingEntity::setObject();
	$AccountingEntity = AccountingEntity::getList();
	$AccountingEntity_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($AccountingEntity as $key => $temp) {
		$AccountingEntity_list["list"][$key] = $temp->getFieldSet("accountingentity-list")->title;
		//var_dump($temp);
	}

	//SaleType
	SaleType::setObject();
	$SaleType = SaleType::getList();
	$SaleType_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($SaleType as $key => $temp) {
	    $SaleType_list["list"][$key] = $temp->getFieldSet("saletype-list")->title;
	}

	//ContractTypes
	ContractTypes::setObject();
	$ContractTypes = ContractTypes::getList();
	$ContractTypes_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($ContractTypes as $key => $temp) {
	    $ContractTypes_list["list"][$key] = $temp->getFieldSet("contracttype-list")->title;
	}
	
	//ContractStatus
	ContractStatus::setObject();
	$ContractStatus = ContractStatus::getList();
	$ContractStatus_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($ContractStatus as $key => $temp) {
	    $ContractStatus_list["list"][$key] = $temp->getFieldSet("contractstatus-list")->title;
	}

	//Agency
	Agency::setObject();
	$Agency = Agency::getList();
	$Agency_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($Agency as $key => $temp) {
	    $Agency_list["list"][$key] = $temp->getFieldSet("agency-list")->title;
	}

	//Promotion
	Promotion::setObject();
	$Promotion = Promotion::getList();
	$Promotion_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($Promotion as $key => $temp) {
	    $Promotion_list["list"][$key] = $temp->getFieldSet("promotion-list")->title;
	}

	//CalculationForm
	CalculationForm::setObject();
	$CalculationForm = CalculationForm::getList();
	$CalculationForm_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($CalculationForm as $key => $temp) {
	    $CalculationForm_list["list"][$key] = $temp->getFieldSet("calculationform-list")->title;
	}

	//MortgageBank
	MortgageBank::setObject();
	$MortgageBank = MortgageBank::getList();
	$MortgageBank_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($MortgageBank as $key => $temp) {
	    $MortgageBank_list["list"][$key] = $temp->getFieldSet("mortgagebank-list")->title;
	}

	//SaleObject
	Flats::setObject();
	$Flats = Flats::getList();


	Buildings::setObject("building");
	$Buildings = Buildings::getList();

	$SaleObject_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($Flats as $key => $temp) {
		$t=$temp->getFieldSet("flats-list");

		$SaleObject_list["list"][$t->id] = "ЖК " . $Buildings[$t->id_b]->object->complex . 
			", Литер " . $Buildings[$t->id_b]->object->liter .
			", квартира " . $t->number;
	}
	//FacingType
	FacingType::setObject();
	$FacingType = FacingType::getList();
	$FacingType_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($FacingType as $key => $temp) {
	    $FacingType_list["list"][$key] = $temp->getFieldSet("facingtype-list")->title;
	}

	$stage_statuses = array(
		"list" => Contract::$stage_status,
	);
	Users::setObject("user");
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "contract-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)

		->add("accountingEntity", "Субъект учета", "select",   $html_object . "[params][accountingEntity]", htmlspecialchars($item->params->accountingEntity), 6, true, $AccountingEntity_list, $disabled)
		->add("contractNumber", "Номер договора", "text", $html_object . "[params][contractNumber]", htmlspecialchars($item->params->contractNumber), 6, true, "", $disabled)
		->add("contractDate", "Дата договора", "date", $html_object . "[params][contractDate]", htmlspecialchars($item->params->contractDate), 6, true, "", $disabled)
		->add("creationDate", "Дата создания договора", "date", $html_object . "[params][creationDate]", htmlspecialchars($item->params->creationDate), 6, true, "", "disabled")
		->add("registrationDate", "Дата регистрации договора", "date", $html_object . "[params][registrationDate]", htmlspecialchars($item->params->registrationDate), 6, true, "", $disabled)
		->add("saleType", "Тип продажи", "select",   $html_object . "[params][saleType]", htmlspecialchars($item->params->saleType), 6, true, $SaleType_list, $disabled)
		->add("contractTypes", "Тип договора", "select",   $html_object . "[params][contractTypes]", htmlspecialchars($item->params->contractTypes), 6, true, $ContractTypes_list, $disabled)
		->add("contractStatus", "Статус договора", "select",   $html_object . "[params][contractStatus]", htmlspecialchars($item->params->contractStatus), 6, true, $ContractStatus_list, $disabled)
		->add("contractPrice", "Сумма договора", "text", $html_object . "[params][contractPrice]", htmlspecialchars($item->params->contractPrice), 6, true, "", $disabled)
		
		//->add("rosFinMon", "РосФинМониторинг", "checkbox", $html_object . "[params][rosFinMon]", htmlspecialchars($item->params->rosFinMon), 6, true)
		//->add("NDS", "НДС", "checkbox", $html_object . "[params][NDS]", htmlspecialchars($item->params->NDS), 6, true) */

		->add("agency", "Агенства недвижимости", "select",   $html_object . "[params][agency]", htmlspecialchars($item->params->agency), 6, true, $Agency_list, $disabled)
		->add("realtorReward", "Риелторские вознаграждения", "text", $html_object . "[params][realtorReward]", htmlspecialchars($item->params->realtorReward), 6, true, "", $disabled)
		->add("promotion", "Акции", "select",   $html_object . "[params][promotion]", htmlspecialchars($item->params->promotion), 6, true, $Promotion_list, $disabled)
		->add("calculationForm", "Форма расчета", "select",   $html_object . "[params][calculationForm]", htmlspecialchars($item->params->calculationForm), 6, true, $CalculationForm_list, $disabled)
		->add("mortgageBank", "Ипотечный банк", "select",   $html_object . "[params][mortgageBank]", htmlspecialchars($item->params->mortgageBank), 6, true, $MortgageBank_list, $disabled)
		->add("paymentSchedule", "График платежей", "text", $html_object . "[params][paymentSchedule]", htmlspecialchars($item->params->paymentSchedule), 6, true, "", $disabled)
		->add("saleObject", "Объект продажи", "select",   $html_object . "[params][saleObject]", htmlspecialchars($item->params->saleObject), 6, true, $SaleObject_list, $disabled)
		->add("facingType", "Вид отделки", "select",   $html_object . "[params][facingType]", htmlspecialchars($item->params->facingType), 6, true, $FacingType_list, $disabled)
		
		->add("", "", "html", "", "<hr>")
		->add("stageStatus", "Статус согласования", "select", $html_object . "[params][stageStatus]", htmlspecialchars($item->params->stageStatus), 6, true, $stage_statuses)
		->add("", "", "html", "", "<hr>")
		->setSubmit("Сохранить", $disabled)
		->parse();			
	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ДОГОВОРЫ<small>форма редактирования</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
                <?=$form?>
       		</div>
			
	  	  </div>
  		</div>
</div>
    </div>
  </div>
</div>

