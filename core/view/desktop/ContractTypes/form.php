<?php 
	use RedCore\Contracttypes\Collection as Contracttypes;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;

	$html_object = "contracttype";
	
	$lb_params = array(
		"id" => Request::vars("contracttype_id"),
	);
	
	Contracttypes::setObject("contracttype");
	$item = Contracttypes::loadBy($lb_params);
	$item = $item->object;
	
	
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
		->add("redirect", "redirect", "hidden", "redirect", "contracttype-list", 6, false)
		->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)

		->add("title", "Вид отделки", "text",   $html_object . "[title]", htmlspecialchars($item->title), 6, true)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ТИП ДОГОВОРА<small>форма редактирования</small></h2>
        
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

