<?php 
	use RedCore\accountingentity\Collection as accountingentity;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;

	$html_object = "accountingentity";
	
	$lb_params = array(
		"id" => Request::vars("accountingentity_id"),
	);
	
	accountingentity::setObject("accountingentity");
	$item = accountingentity::loadBy($lb_params);
	$item = $item->object;
	
	
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "accountingentity-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]", htmlspecialchars($item->id), 6, false)
		
		->add("title", "Субъект учета", "text", $html_object . "[title]", htmlspecialchars($item->title), 6, true)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Субъекты учета<small>форма редактирования</small></h2>
        
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

