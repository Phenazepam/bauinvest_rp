<?php 
	use RedCore\Partner\Collection as Partner;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;
	use RedCore\ContractTypes\Collection as ContractTypes;

	$html_object = "partner";
	
	$lb_params = array(
		"id" => Request::vars("partner_id"),
	);
	
	Partner::setObject("partner");
	$item = Partner::loadBy($lb_params);
	$item = $item->object;
	
	ContractTypes::setObject();
	$items_ct = ContractTypes::getList();
	
	$contract_type_list["list"] = array(
	    "0" => "Не выбран",
	);
	
	foreach($items_ct as $key => $item_ct) {
	    $contract_type_list["list"][$key] = $item_ct->getFieldSet("partner-form-list")->title;
	}
	
	
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "partner-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)
		->add("f", "Фамилия", "text", $html_object . "[params][f]", htmlspecialchars($item->params->f), 6, true)
		->add("i", "Имя", "text", $html_object . "[params][i]", htmlspecialchars($item->params->i), 6, true)
		->add("o", "Отчество", "text",   $html_object . "[params][o]", htmlspecialchars($item->params->o), 6, true)
		->add("phoneNumber", "Номер телефона", "text",   $html_object . "[params][phoneNumber]", htmlspecialchars($item->params->phoneNumber), 6, true)
		->add("email", "Электронная почта", "text",   $html_object . "[params][email]", htmlspecialchars($item->params->email), 6, true)
		->add("connectionToContract", "Привязка к контракту", "text",   $html_object . "[params][connectionToContract]", htmlspecialchars($item->params->connectionToContract), 6, true)
		
		//->add("contract_type", "Тип договора", "select",   $html_object . "[params][contract_type]", htmlspecialchars($item->params->contract_type), 6, true, $contract_type_list)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Контрагенты<small>форма редактирования</small></h2>
        
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

