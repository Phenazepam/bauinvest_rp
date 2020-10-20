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
        $text = '<div class="row">
                <div class="col">
                    <h3>Договор № '.$item->params->contractNumber.'</h3>
                </div>
                </div>
                <div class="row">
                    <div class="col">
                        Субъект учета: '. $item->params->accountingEntity .'
                    </div>
                </div>
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
                <div class="row">
                    <div class="col">
                        Типа продажи: '. $item->params->saleType .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Типа договора: '. $item->params->contractTypes .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Статус договора: '. $item->params->contractStatus .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Стоимость договора: '. $item->params->contractPrice .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Агенства недвижимости: '. $item->params->agency .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Риелторские вознаграждения: '. $item->params->realtorReward .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Акции: '. $item->params->promotion .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Форма расчета: '. $item->params->calculationForm .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Ипотечный банк: '. $item->params->mortgageBank .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        График платежей: '. $item->params->paymentSchedule .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Объект продажи: '. $item->params->saleObject .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Вид отделки: '. $item->params->facingType .'
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Статус работы: '. $item->params->stage_status .'
                    </div>
                </div>';



            $form = Forms::Create()
            ->add("redirect", "redirect", "hidden", "redirect", "contract-list", 6, false)
            ->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)
    
            ->add("text", 'text', "html", "contract-form-view", $text)
    
            //->add("stagestatus", "", "hidden",   $html_object . "[params][stagestatus]", htmlspecialchars($item->params->stagestatus), 6, true)
            ->setSubmit("Сохранить", $disabled)
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

