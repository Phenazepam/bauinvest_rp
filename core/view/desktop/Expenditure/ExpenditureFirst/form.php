<?php

use RedCore\ExpenditureFirst\Collection as ExpenditureFirst;
use RedCore\Request as Request;
use RedCore\Forms as Forms;

$html_object = "expenditurefirst";

$lb_params = array(
	"id" => Request::vars("expenditurefirst_id"),
);

ExpenditureFirst::setObject("expenditurefirst");
$item = ExpenditureFirst::loadBy($lb_params);
$item = $item->object;


$form = Forms::Create()
	->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
	->add("redirect", "redirect", "hidden", "redirect", "expenditurefirst-list", 6, false)
	->add("id", "Id", "hidden", $html_object . "[id]", htmlspecialchars($item->id), 6, false)

	->add("title", "Укрупненная статья расхода", "text",   $html_object . "[title]", htmlspecialchars($item->title), 6, true)
	->parse();
?>


<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>СТАТЬИ РАСХОДА (УКРУПНЕННЫЕ)<small>форма редактирования</small></h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<?= $form ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>