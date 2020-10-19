<?php 
	use RedCore\Autos\Collection as Autos;
	use RedCore\Request as Request;
	use RedCore\Forms as Forms;

	$html_object = "auto";
	
	$lb_params = array(
		"id" => Request::vars("auto_id"),
	);
	
	Autos::setObject("auto");
	$item = Autos::loadBy($lb_params);
	$item = $item->object;
	
	
	$form = Forms::Create()
		->add("action",   "action",   "hidden", "action",                     $html_object . ".store.do",         6, false)
		->add("redirect", "redirect", "hidden", "redirect",                   "autos-list",                       6, false)
		
		->add("id",       "Id",       "hidden", $html_object . "[id]",        htmlspecialchars($item->id),        6, false)
		->add("title",        "Наименование",  "text",   $html_object . "[title]", htmlspecialchars($item->title), 6, true)
		->add("date",        "Дата",  "date",   $html_object . "[date]", '12.12.1990', 6, true)
		->parse();	
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>АВТОМОБИЛИ<small>форма редактирования</small></h2>
        
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

