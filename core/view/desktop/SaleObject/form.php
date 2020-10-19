<?php 
	use RedCore\SaleObject\Collection as SaleObject;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;

	$html_object = "saleobject";
	
	$lb_params = array(
		"id" => Request::vars("saleobject_id"),
	);
	
	SaleObject::setObject("saleobject");
	$item = SaleObject::loadBy($lb_params);
	$item = $item->object;

	$rooms = array(
		"list" => array('Студия', '1 комнатная', '2 комнатная', '3 комнатная', '4 комнатная', '5 комнатная')
	);
	
	
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "saleobject-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)

		->add("liter", "Литер", "text",   $html_object . "[params][liter]", htmlspecialchars($item->params->liter), 6, true)
		->add("level", "Этаж", "text",   $html_object . "[params][level]", htmlspecialchars($item->params->level), 6, true)
		->add("number", "Номер", "text",   $html_object . "[params][number]", htmlspecialchars($item->params->number), 6, true)
		->add("rooms", "Количество комнат", "select",   $html_object . "[params][rooms]", htmlspecialchars($item->params->rooms), 6, true, $rooms)
		->add("spaceFull", "Общая площадь", "text",   $html_object . "[params][spaceFull]", htmlspecialchars($item->params->spaceFull), 6, true)
		->add("spaceWithoutBalc", "Площадь без учета балкона", "text",   $html_object . "[params][spaceWithoutBalc]", htmlspecialchars($item->params->spaceWithoutBalc), 6, true)
		->add("sqmtPrice", "Стоимость кв.м.", "text",   $html_object . "[params][sqmtPrice]", htmlspecialchars($item->params->sqmtPrice), 6, true)
		->add("totalPrice", "Общая стоимость", "text",   $html_object . "[params][totalPrice]", htmlspecialchars($item->params->totalPrice), 6, true)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ОБЪЕКТЫ ПРОДАЖИ<small>форма редактирования</small></h2>
        
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

