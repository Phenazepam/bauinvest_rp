<?php 
	use RedCore\accountingentity\Collection as AccountingEntity;
	use RedCore\saletype\Collection as SaleType;
	use RedCore\ContractTypes\Collection as ContractTypes;
	use RedCore\contractstatus\Collection as ContractStatus;
	use RedCore\agency\Collection as Agency;
	use RedCore\promotion\Collection as Promotion;
	use RedCore\CalculationForm\Collection as CalculationForm;
	use RedCore\mortgagebank\Collection as MortgageBank;
	use RedCore\SaleObject\Collection as SaleObject;
	use RedCore\Facingtypes\Collection as FacingType;
	use RedCore\Flats\Collection as Flat;
	use RedCore\Buildings\Collection as Buildings;
	use RedCore\Users\Collection as Users;

	use RedCore\Contract\Collection as Contract;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;
	use RedCore\Session as Session;

AccountingEntity::setObject();
$AccountingEntity = AccountingEntity::getList();

SaleType::setObject();
$SaleType = SaleType::getList();

ContractTypes::setObject();
$ContractTypes = ContractTypes::getList();


ContractStatus::setObject();
$ContractStatus = ContractStatus::getList();


Agency::setObject();
$Agency = Agency::getList();


Promotion::setObject();
$Promotion = Promotion::getList();


CalculationForm::setObject();
$CalculationForm = CalculationForm::getList();


MortgageBank::setObject();
$MortgageBank = MortgageBank::getList();


Flat::setObject();
$Flat = Flat::getList();

Buildings::setObject("building");
$Buildings = Buildings::getList();

FacingType::setObject();
$FacingType = FacingType::getList();
    

	$html_object = "contract";
	$lb_params = array(
		"id" => Request::vars("contract_id"),
	);
	Contract::setObject("contract");
	$item = Contract::loadBy($lb_params);
	$item = $item->object;
        $text = '<div class="row">
                <div class="col">
                    <h3>Договор № '.$item->params->contractNumber.'</h3>
                </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Субъект учета: '. $AccountingEntity[$item->params->accountingEntity]->object->title .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Дата договора: '. $item->params->contractDate .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Дата создания договора: '. $item->params->creationDate .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Дата регистрации договора: '. $item->params->registrationDate .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Типа продажи: '.$SaleType[$item->params->saleType]->object->title .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Типа договора: '. $ContractTypes[$item->params->contractTypes]->object->title .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Статус договора: '. $ContractStatus[$item->params->contractStatus]->object->title .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Стоимость договора: '. $item->params->contractPrice .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Агенства недвижимости: '. $Agency[$item->params->agency]->object->title .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Риелторские вознаграждения: '. $item->params->realtorReward .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Акции: '. $Promotion[$item->params->promotion]->object->title .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Форма расчета: '. $CalculationForm[$item->params->calculationForm]->object->title .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Ипотечный банк: '. $MortgageBank[$item->params->mortgageBank]->object->title .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        График платежей: '. $item->params->paymentSchedule .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Объект продажи: '. 
                        "ЖК ".$Buildings[$Flat[$item->params->saleObject]->object->id]->object->complex .
                        ", Литер ".$Buildings[$Flat[$item->params->saleObject]->object->id]->object->liter .
                        ", Квартира ".$Flat[$item->params->saleObject]->object->params->number .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Вид отделки: '. $FacingType[$item->params->facingType]->object->title .'
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        Статус работы: '. $item->params->stage_status .'
                    </div>
                </div>
                <hr>';



            $form = Forms::Create()
            ->add("redirect", "redirect", "hidden", "redirect", "contract-list", 6, false)
            ->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)
    
            ->add("text", 'text', "html", "contract-form-view", $text)
    
            //->add("stagestatus", "", "hidden",   $html_object . "[params][stagestatus]", htmlspecialchars($item->params->stagestatus), 6, true)
            ->setSubmit("Вернуться к списку", $disabled)
            ->parse();	


?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ДОГОВОРЫ<small>форма просмотра</small></h2>
        
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

