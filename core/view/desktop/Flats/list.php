<?php
use \RedCore\Buildings\Collection as Buildings;
use \RedCore\Flats\Collection as Flats;
use \RedCore\ObjectStatus\Collection as ObjectStatus;
use \RedCore\Flats\ChessTower as ChessTower;
use RedCore\Request as Request;
use \RedCore\Where as Where;
use \RedCore\Flats\CopyFlats as Copy;

require('copyFlats.php');
$ChessTower = require('list.chessTower.php');

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


$flats= array();
foreach($items as $item){
  $flats[]=array(
	"id" => $item->object->id,
    "x" =>(int)$item->object->x,
    "y" => (int)$item->object->y,
	"rooms" => $item->object->params->rooms,
	"spaceFull" => $item->object->params->spaceFull,
	"spaceWithoutBalc" => $item->object->params->spaceWithoutBalc,
	"sqmtPrice" => $item->object->params->sqmtPrice,
	"number" => $item->object->params->number,
	"totalPrice" => $item->object->params->totalPrice,
	"flatStatus" => $item->object->params->flatStatus,
	"complex" => $temp->object->complex,
	"liter" => $temp->object->liter,
	"entrance" => $temp->object->entrance,
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
                              <a class="dropdown-item DoCopyVertical" data-flat-id=<?=$oFS->id?> onClick="DoCopyVertical()">Копировать квартиру на весь стояк</a>
                              <div class="dropdown-divider"></div>
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




	<!-- '<td 
		class="section__houseTd
		click-td                                
		section__houseTd-'. $this->flat_status[$val["flatStatus"]] .' 
		section__houseTd-vkbn-'. $this->flat_status[$val["flatStatus"]] .' 
		section__houseTd-special-false 
		section__houseTd-red-false"
		data-action="openAlert" 
		data-complex="'. $val["complex"] .'" 
		data-house="'. $val["liter"] .'" 
		data-section="" 
		data-entrance="'. $val["entrance"] .'" 
		data-floor="'. $val["y"] .'" 
		data-rooms="'. $this->rooms[$val["rooms"]] .'" 
		data-area-full="'. $val["spaceFull"] .'" 
		data-area-live="'. $val["spaceWithoutBalc"] .'" 
		data-num="'.  $val["number"] .'" "="" 
		data-plan-img="/base/img/plans/pochta18/1_16-22_2_64,5.png" 
		data-status="sold" 
		data-status-name="продана" 
		data-status-vkbn="sold" 
		data-status-vkbn-name="продана" 
		data-book-time="" 
		data-cost-m2="'. $val["sqmtPrice"] .'" 
		data-cost-total="'. $val["totalPrice"].' 
		data-events="" 
		data-events-name="" 
		data-user="undefined" 
		data-date="undefined" 
		data-fio="undefined" 
		data-phone="undefined" 
		data-comment="undefined" 
		data-special="false" 
		data-red="false">
		<span class="section__houseNum section__houseNum-room" >'. 
		$val["rooms"].'</span>
		<span class="section__houseNum section__houseNum-number g-hidden" >
		</span>
	</td>'; -->



<script src="/template/general/vendors/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('.click-td').click(function (e) {
		let flat_id=$(this).attr('data-flat-id')
		let number=$(this).attr('data-num')
		let complex=$(this).attr('data-complex')
		let liter=$(this).attr('data-house')
		let entrance=$(this).attr('data-entrance')
		let floor=$(this).attr('data-floor')
		let rooms=$(this).attr('data-rooms')
		let spaceFull=$(this).attr('data-area-full')
		let spaceWithoutBalc=$(this).attr('data-area-live')
		let sqmtPrice=$(this).attr('data-cost-m2')
		let totalPrice=$(this).attr('data-cost-total')
		Swal.fire({
			title: 'Квартира №' + number,
			html:
			'<div class="row">'+
			'<div class="col">'+
			'	Объект: ЖК "'+complex+'", Дом ' + liter +
			'</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col">'+
			'		Подъезд: '+ entrance +', Этаж: , '+ floor +
			'	</div>'+
			'</div>'+
			'<hr>'+
			'<div class="row">'+
			'	<div class="col">'+
			'		Количество комнат: '+ rooms +
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col">'+
			'		Общая площадь: '+ spaceFull +', площадь без балкона: '+ spaceWithoutBalc +
			'	</div>'+
			'</div>'+
			'<hr>'+
			'<div class="row">'+
			'	<div class="col">'+
			'		Цена за квадратный метр: '+ sqmtPrice +', Общая стоимость: '+ totalPrice +
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col">'+
			'		Статус: '+
			'	</div>'+
			'</div>',
			showCancelButton: true,
			confirmButtonText: `Открыть запись`,
			cancelButtonText: `Закрыть`,
			}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				window.location.href = '/flats-form?flat_id='+flat_id;
			}
		})

	});
    
});
</script>

<script>
	$(document).ready(function () {
    	$('.DoCopyVertical').click(function (e) {
		let flat_id = $(this).attr('data-flat-id')
			$.ajax({
				type: "post",
				url: "core/view/desktop/Flats/copyFlats.php",
				data: {
					flat_id : flat_id,
				},
				success: function (response) {
					Swal.fire({
						title: response.text,
					})
					
				}
			});
		})
	})

</script>




<!-- <script>
	document.addEventListener('DOMContentLoaded', function(){
    const table = document.getElementsByTagName('table');
    for (let tbl of table) {
        tbl.addEventListener('click', (event) => {
            if(event.target.dataset.action === "openAlert"){
				Swal.fire({
				})
			}
        })
    }
})
</script> -->

