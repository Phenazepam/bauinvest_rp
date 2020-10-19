<?php 
	use RedCore\promotion\Collection as promotion;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;

	$html_object = "promotion";
	
	$lb_params = array(
		"id" => Request::vars("promotion_id"),
	);
	
	promotion::setObject("promotion");
	$item = promotion::loadBy($lb_params);
	$item = $item->object;
	
/* 	$date = $item->params->startDate;
	$date = substr($date, 0, 10);
	var_dump($date);
	$temp = strtotime($date);
	var_dump($temp);
	$item->params->startDate=date("d.m.Y", $temp);
	var_dump($item->params->startDate); */


	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "promotion-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)

		->add("title", "Наименование акции", "text",   $html_object . "[title]", htmlspecialchars($item->title), 6, true)
		->add("startDate", "Дата начала", "date",   $html_object . "[params][startDate]", htmlspecialchars($item->params->startDate), 6, false)
		->add("finishDate", "Дата окончания", "date",   $html_object . "[params][finishDate]", htmlspecialchars($item->params->finishDate), 6, false)
		->add("discountAmount", "Размер скидки", "text",   $html_object . "[params][discountAmount]", htmlspecialchars($item->params->discountAmount), 6, false)
		->add("isActive", "Действующая", "text",   $html_object . "[params][isActive]", htmlspecialchars($item->params->isActive), 6, false)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>АКЦИИ<small>форма редактирования</small></h2>
        
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

