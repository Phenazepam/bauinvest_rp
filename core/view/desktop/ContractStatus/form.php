<?php 
	use RedCore\contractstatus\Collection as contractstatus;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;

	$html_object = "contractstatus";
	
	$lb_params = array(
		"id" => Request::vars("contractstatus_id"),
	);
	
	contractstatus::setObject("contractstatus");
	$item = contractstatus::loadBy($lb_params);
	$item = $item->object;
	
	
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "contractstatus-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)
		->add("title", "Статус договора", "text", $html_object . "[title]", htmlspecialchars($item->title), 6, true)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>СТАТУСЫ ДОГОВОРА<small>форма редактирования</small></h2>
        
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

