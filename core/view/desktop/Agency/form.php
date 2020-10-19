<?php 
	use RedCore\agency\Collection as agency;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;

	$html_object = "agency";
	
	$lb_params = array(
		"id" => Request::vars("agency_id"),
	);
	
	agency::setObject("agency");
	$item = agency::loadBy($lb_params);
	$item = $item->object;
	
	
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "agency-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)
		
		->add("title", "Юридическое название", "text",   $html_object . "[title]", htmlspecialchars($item->title), 6, true)
		->add("comName", "Коммерческое название", "text",   $html_object . "[params][comName]", htmlspecialchars($item->comName), 6, true)
		->add("inn", "ИНН", "text",   $html_object . "[params][inn]", htmlspecialchars($item->inn), 6, true)
		->add("paymentProcent", "Процент вознаграждения", "text",   $html_object . "[params][paymentProcent]", htmlspecialchars($item->paymentProcent), 6, true)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>АГЕНСТВА НЕДВИЖИМОСТИ<small>форма редактирования</small></h2>
        
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

