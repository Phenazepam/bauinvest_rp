<?php

use \RedCore\Liter\Collection as Liter;
use RedCore\Request as Request;
use RedCore\Forms as Forms;

$html_object = "liter";

$lb_params = array(
	"id" => Request::vars("liter_id"),
);

Liter::setObject("liter");
$item = Liter::loadBy($lb_params);
$item = $item->object;


$form = Forms::Create()
	->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
	->add("redirect", "redirect", "hidden", "redirect", "liter-list", 6, false)
	->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)

	->add("title", "Литер", "text", $html_object . "[title]", htmlspecialchars($item->title), 6, true)
	->add("complex", "Жилой комплекс", "text",   $html_object . "[complex]", htmlspecialchars($item->complex), 6, true)
	->parse();
?>


<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>ПОМЕЩЕНИЯ<small>форма редактирования</small></h2>

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