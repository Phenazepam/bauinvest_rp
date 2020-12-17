<?php

use RedCore\Expenditure\Collection as Expenditure;
use RedCore\Request as Request;
use RedCore\Forms as Forms;

$html_object = "expenditure";

$lb_params = array(
	"id" => Request::vars("expenditure_id"),
);

$pid = Request::vars("pid");

Expenditure::setObject("expenditure");
$item = Expenditure::loadBy($lb_params);
$item = $item->object;

if(is_null($item->pid)){
	$item->pid = $pid;
}


$form = Forms::Create()
	->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
	->add("redirect", "redirect", "hidden", "redirect", "expenditure-list", 6, false)
	->add("id", "Id", "hidden", $html_object . "[id]", htmlspecialchars($item->id), 6, false)
	->add("pid", "pid", "hidden", $html_object . "[pid]", htmlspecialchars($item->pid), 6, false)

	->add("title", "Статья расхода", "text",   $html_object . "[title]", htmlspecialchars($item->title), 6, true)
	->parse();
?>


<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>СТАТЬИ РАСХОДА <small>форма редактирования</small></h2>

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