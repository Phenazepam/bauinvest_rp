<?php
use \RedCore\Buildings\Collection as Buildings;
use \RedCore\Flats\Collection as Flats;
use \RedCore\ObjectStatus\Collection as ObjectStatus;
use \RedCore\ChessTower as ChessTower;
use RedCore\Request as Request;
use \RedCore\Where as Where;

$lb_params = array(
	"id_b" => Request::vars("building_id"),
);
$lb_params_b = array(
	"id" => Request::vars("building_id"),
);

Buildings::setObject("building");
$temp = Buildings::loadBy($lb_params_b);

ObjectStatus::setObject();
$ObjectStatus = ObjectStatus::getList();

$id_b = Request::vars("building_id");
Flats::setObject("flat");

$where = Where::Cond()
    ->add("id_b", "=", $id_b)
    ->parse();

$items = Flats::getList($where);


//var_dump($items);
$complex = $temp->object->complex;
$liter = $temp->object->liter;
$entrance = $temp->object->entrance;
$id_b = $temp->object->id;
$row = $temp->object->params->levels;
$col = $temp->object->params->flatsOnLvl;
//var_dump($items);
$flats= array();
foreach($items as $item){
  $flats[]=array(
    "x" =>(int)$item->object->x,
    "y" => (int)$item->object->y,
    "rooms" => $item->object->params->rooms,
  );
} 
//var_dump($flats);


$tower = ChessTower::Create($col, $row, $flats)->Build();



?>

<div class="row">
  <div class="col">

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ЖК "<?=$complex?>" Литер <?=$liter?> Подъезд №<?=$entrance?><small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/flats-form?building_id=<?=$id_b?>">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Статус квартиры</th>
                          <th>Номер квартиры</th>
                          <th>Число комнат</th>
                          <th>Общая площадь</th>
                          <th>Площадь без балкона</th>
                          <th>Цена за кв.м.</th>
                          <th>Общая стоимость</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item): 
                          //var_dump($item);
                          $oFS = $item->getFieldSet("flats-list");
                          //var_dump($oFS);
                           
                      ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$ObjectStatus[$oFS->flatStatus]->object->title?></td>
                          <td><?=$oFS->number?></td>
                          <td><?=$oFS->rooms?></td>
                          <td><?=$oFS->spaceFull?></td>
                          <td><?=$oFS->spaceWithoutBalc?></td>
                          <td><?=$oFS->sqmtPrice?></td>
                          <td><?=$oFS->totalPrice?></td>
                          <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Действия
                            </button>
                            <div class="dropdown-menu">
                              
                              <a class="dropdown-item" href="/flats-form?flat_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/flats-list?action=flat.delete.do&flat[id]=<?=$oFS->id?>">Удалить</a>
                            </div>
                          </div>
                          </td>
                        </tr>
                       <?php
                        endforeach;
                       ?>
                      </tbody>
                    </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col">
    <?=$tower?>
</div>
</div>


<style>
body {
	margin: 0;
}
html {
	line-height: 1.15;
	-webkit-text-size-adjust: 100%;
}
::selection {
	background: #b3d4fc;
	text-shadow: none;
}
*, *::before, *::after {
	-webkit-box-sizing: inherit;
	box-sizing: inherit;
	max-height: 999999px;
}
html {
	background: #f5f5f5;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	color: #161d34;
	font: 18px/1.35 "Bauinvest RobotoExo", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue Cyr", "Helvetica CY", Roboto, Ubuntu, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	min-width: 600px;
	text-align: center;
}
.section__houseContent {
	font-size: 16px;
	line-height: 20px;
}
.section__houseContent {
	padding: 0 7px;
	position: relative;
}
.section {
	-webkit-box-sizing: content-box;
	box-sizing: content-box;
	position: relative;
}
.objectsInfo, .checkMate {
	padding: 40px;
}
.landing__line {
	margin: 30px 8px 0;
}
/* @media only screen and (min-width:1041px) */
.landing__line {
	margin-left: auto;
	margin-right: auto;
	width: 1020px;
}
.g-bgWhite {
	background: #fff;
}
.landing__line-checkMate {
	position: relative;
}
.landing__wrap {
	margin: 0 auto;
	max-width: 1920px;
	overflow: hidden;
	background: #f3f3f3;
}
.landing__wrap-checkMate {
	overflow: visible;
}
/* @media only screen and (min-width:1041px) */
main {
	margin-top: 206px;
}
/* @media only screen and (min-width:1500px) */
main {
	margin-top: 228px;
}
/* @media screen and (min-width:1041px) */
main {
	margin-top: 170px;
}
.main-content {
	padding-top: 130px;
}
/* @media only screen and (min-width:1041px) */
.main-content {
	padding-top: 0px;
}
.section__houseWrap {
	display: inline-block;
	padding: 10px 10px 5px 0;
	white-space: nowrap;
}
.section__houseContent :last-of-type.section__houseWrap {
	padding-right: 0px;
}
.section__house {
	display: inline-block;
	vertical-align: top;
}
.section__h {
	padding-bottom: 6px;
	text-align: center;
}
.g-dib {
	display: inline-block;
	vertical-align: middle;
}
.section__houseTable {
	border: 1px solid #999;
	border-spacing: 1px;
	border-collapse: separate;
}
.section__houseTd-vkbn-sold {
	pointer-events: none;
}
.section__houseTd-noBorder {
	height: 34px;
}
/* @media only screen and (min-width:1041px) */
.section__houseTd-noBorder {
	padding: 4px;
}
/* @media only screen and (min-width:1560px) */
.section__houseTd-noBorder {
	padding: 5px;
}
.section__houseTd {
	border: 2px solid #999;
	cursor: pointer;
	position: relative;
}
.section__houseTd-vkbn-sold, .section__houseTd-vkbn-pay {
	background: #adadad;
}
/* @media only screen and (min-width:1041px) */
.section__houseNum {
	padding: 2px 0;
}
/* @media only screen and (min-width:1560px) */
.section__houseNum {
	padding: 3px 0;
}
.g-hidden {
	display: none !important;
}
.section__houseNum {
	display: block;
	padding: 0 0;
	text-align: center;
	width: 28px;
}
.section__houseTd-vkbn-book {
	background: url(../img/book-bg-min.png) center center no-repeat;
}
.section__houseTd-free.section__houseTd-special-true, .section__houseTd-vkbn-free.section__houseTd-special-true, .section__houseTd-book.section__houseTd-special-true, .section__houseTd-vkbn-book.section__houseTd-special-true, .section__houseTd-pay.section__houseTd-special-true, .section__houseTd-vkbn-pay.section__houseTd-special-true {
	border-color: #2caf31 !important;
}
.section__houseTd-free.section__houseTd-red-true, .section__houseTd-vkbn-free.section__houseTd-red-true, .section__houseTd-book.section__houseTd-red-true, .section__houseTd-vkbn-book.section__houseTd-red-true, .section__houseTd-pay.section__houseTd-red-true, .section__houseTd-vkbn-pay.section__houseTd-red-true {
	border-color: #af2c2c !important;
}
.section__roofTopTable {
	border-collapse: collapse;
	width: 100%;
}
.section__roofBottomTable {
	border-collapse: collapse;
	width: 100%;
}
.section__roofOuter {
	background: #999;
	border-color: #999;
	padding: 2px;
}
.section__roofTd {
	border: 1px solid #999;
	padding: 1px;
}
.section__roofTd-1 {
	width: 12%;
}
.section__roofTd-2 {
	width: 9%;
}
.section__roofTd-3 {
	width: 11%;
}
.section__roofTd-4 {
	width: 15%;
}
.section__roofTd-5 {
	width: 17%;
}
.section__roofTd-6 {
	width: 19%;
}
.section__roofTd-7 {
	width: 17%;
}
.section__house-floor .section__houseCenterer {
	margin-top: 14px;
}
.section__house-floor .section__houseTable {
	border-right: 0;
}
.section__houseTd-noBorder {
	border: 0;
	cursor: auto;
	padding: 0px;
}
</style>