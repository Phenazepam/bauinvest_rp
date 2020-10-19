<?php

use \RedCore\Flats\Collection as Flats;
use \RedCore\ObjectStatus\Collection as ObjectStatus;
use RedCore\Request as Request;
use RedCore\Forms as Forms;

$html_object = "flat";

$lb_params = array(
	"id" => Request::vars("flat_id"),
);
$id_b = Request::vars("building_id");
Flats::setObject("flat");
$item = Flats::loadBy($lb_params);
$item = $item->object;

if(empty($item->id_b)){
	$item->id_b = $id_b;
}

ObjectStatus::setObject();
	$ObjectStatus = ObjectStatus::getList();
	$ObjectStatus_list["list"] = array(
	    "0" => "Не выбран",
	);
	foreach($ObjectStatus as $key => $temp) {
	    $ObjectStatus_list["list"][$key] = $temp->getFieldSet("objectstatus-list")->title;
	}

$form = Forms::Create()
	->add("action",   "action",   "hidden", "action", $html_object . ".store.do", 6, false)
	->add("redirect", "redirect", "hidden", "redirect", "flats-list?building_id=$id_b", 6, false)
	->add("id", "Id", "hidden", $html_object . "[id]",htmlspecialchars($item->id), 6, false)
	->add("id_b", "Id_b", "hidden", $html_object . "[id_b]",htmlspecialchars($item->id_b), 6, false)

	->add("y", "Этаж №", "text",   $html_object . "[y]", htmlspecialchars($item->y), 6, true)
	->add("x", "Стояк №", "text",   $html_object . "[x]", htmlspecialchars($item->x), 6, true)
	->add("number", "Номер квартиры", "text", $html_object . "[params][number]", htmlspecialchars($item->params->number), 6, true)
	->add("rooms", "Количество комнат", "text", $html_object . "[params][rooms]", htmlspecialchars($item->params->rooms), 6, true)
	->add("spaceFull", "Полная площадь", "text", $html_object . "[params][spaceFull]", htmlspecialchars($item->params->spaceFull), 6, true)
	->add("spaceWithoutBalc", "Площадь без балкона", "text", $html_object . "[params][spaceWithoutBalc]", htmlspecialchars($item->params->spaceWithoutBalc), 6, true)
	->add("sqmtPrice", "Цена за кв.м.", "text", $html_object . "[params][sqmtPrice]", htmlspecialchars($item->params->sqmtPrice), 6, true)
	->add("totalPrice", "Полная стоимость", "text", $html_object . "[params][totalPrice]", htmlspecialchars($item->params->totalPrice), 6, true)
	->add("flatStatus", "Статус квартиры", "select", $html_object . "[params][flatStatus]", htmlspecialchars($item->params->flatStatus), 6, true, $ObjectStatus_list)
	
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