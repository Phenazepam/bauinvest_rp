<?php

use \RedCore\Buildings\Collection as Buildings;
use RedCore\Request as Request;
use RedCore\Forms as Forms;

$html_object = "building";

$lb_params = array(
	"id" => Request::vars("building_id"),
);

Buildings::setObject("building");
$item = Buildings::loadBy($lb_params);
$item = $item->object;


$form = Forms::Create()
	->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
	->add("redirect", "redirect", "hidden", "redirect", "buildings-list", 6, false)
	->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)

	->add("complex", "Жилой комплекс", "text",   $html_object . "[complex]", htmlspecialchars($item->complex), 6, true)
	->add("liter", "Литер", "text", $html_object . "[liter]", htmlspecialchars($item->liter), 6, true)
	->add("entrance", "Подъезд", "text", $html_object . "[entrance]",htmlspecialchars($item->entrance),     4, true)
	->add("levels", "Количество этажей", "text", $html_object . "[params][levels]",  htmlspecialchars($item->params->levels),  4, true)
	->add("flatsOnLvl", "Количество квартир на этаже", "text", $html_object . "[params][flatsOnLvl]",htmlspecialchars($item->params->flatsOnLvl),4, true)
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