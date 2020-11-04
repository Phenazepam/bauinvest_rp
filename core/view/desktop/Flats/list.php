<?php

use \RedCore\Buildings\Collection as Buildings;
use \RedCore\Flats\Collection as Flats;
use \RedCore\ObjectStatus\Collection as ObjectStatus;
use \RedCore\Flats\ChessTower as ChessTower;
use RedCore\Request as Request;
use \RedCore\Where as Where;
use \RedCore\Flats\CopyFlats as Copy;
use \RedCore\Session as Session;



Session::bind("building_id", "filter_building_id", -1);
$id_b = Session::get("filter_building_id");


$ChessTower = require('list.chessTower.php');

$lb_params = array(
  "id_b" => $id_b,
);
$lb_params_b = array(
  "id" => $id_b,
);

Buildings::setObject("building");
$temp = Buildings::loadBy($lb_params_b);

ObjectStatus::setObject();
$ObjectStatus = ObjectStatus::getList();

Flats::setObject("flat");

$where = Where::Cond()
  ->add("id_b", "=", $id_b)
  ->add('and')
  ->add("_deleted", "=", "0")
  ->parse();

$items = Flats::getList($where);


//var_dump($items);
$complex = $temp->object->complex;
$liter = $temp->object->liter;
$entrance = $temp->object->entrance;
$id_b = $temp->object->id;
$row = $temp->object->params->levels;
$col = $temp->object->params->flatsOnLvl;


$flats = array();
foreach ($items as $item) {
  $flats[] = array(
    "id" => $item->object->id,
    "x" => (int)$item->object->x,
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
    "img" => $item->object->params->img,
  );
}
//var_dump($flats);


$tower = ChessTower::Create($col, $row, $flats)->Build();



?>


<script src="/core/view/desktop/Flats/CopyLevel.js"></script>

<div class="tabs">
  <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
  <label for="tab-btn-1" class="tab-label">Табличное представление</label>
  <input type="radio" name="tab-btn" id="tab-btn-2" value="">
  <label for="tab-btn-2" class="tab-label">Шахматка</label>

  <div id="content-1">
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>ЖК "<?= $complex ?>" Литер <?= $liter ?> Подъезд №<?= $entrance ?><small>реестр записей</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <a class="btn btn-primary" href="/flats-form?building_id=<?= $id_b ?>">Добавить <i class="fa fa-plus"></i></a>
                  <a class="btn btn-primary" href="/flats-list?action=flats.report.do">Сформировать отчет <i class="fa text-left"></i></a>
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

                      foreach ($items as $key => $item) :
                        $oFS = $item->getFieldSet("flats-list");
                        $objectsCount++;
                        $totalSpaceCount += $oFS->spaceFull;
                        $totalPriceCount += $oFS->totalPrice;


                      ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td><?= $ObjectStatus[$oFS->flatStatus]->object->title ?></td>
                          <td><?= $oFS->number ?></td>
                          <td>
                            <?php 
                              if(0 == $oFS->rooms)
                                echo "С";                              
                              else
                                echo $oFS->rooms;
                            ?>
                          </td>
                          <td><?= $oFS->spaceFull ?></td>
                          <td><?= $oFS->spaceWithoutBalc ?></td>
                          <td><?= $oFS->sqmtPrice ?></td>
                          <td><?= $oFS->totalPrice ?></td>
                          <td>
                            <div class="btn-group btn-group-sm">
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Действия
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="/flats-list?action=flat.copyvertical.do&flat[id]=<?= $oFS->id ?>">Копировать квартиру на весь стояк</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/flats-form?flat_id=<?= $oFS->id ?>">Редактировать</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/flats-list?action=flat.delete.do&flat[id]=<?= $oFS->id ?>">Удалить</a>
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
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <div>
                  <h5>Итого</h5>
                </div>
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Общее количество элементов</th>
                      <th>Общая площадь</th>
                      <th>Общая стоимость</th>
                    </tr>
                  </thead>
                  <tbody>
                    <td><?= $objectsCount ?></td>
                    <td><?= $totalSpaceCount ?></td>
                    <td><?= $totalPriceCount ?></td>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="content-2">
    <div class="x_panel">
      <div class="x_title">
        <h2>ЖК "<?= $complex ?>" Литер <?= $liter ?> Подъезд №<?= $entrance ?><small>реестр записей</small></h2>
        <div class="clearfix"></div>
      </div>
      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Действия
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" id="CopyLevel" maxY="<?=$row?>" maxX="<?=$col?>">Копировать этаж</a>
        <!-- <div class="dropdown-divider"></div> -->
      </div>
      <div class="col">
        <?= $tower ?>
      </div>
    </div>
  </div>
</div>






<script src="/template/general/vendors/jquery/dist/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.click-td').click(function(e) {
      let flat_id = $(this).attr('data-flat-id')
      let number = $(this).attr('data-num')
      let complex = $(this).attr('data-complex')
      let liter = $(this).attr('data-house')
      let entrance = $(this).attr('data-entrance')
      let floor = $(this).attr('data-floor')
      let rooms = $(this).attr('data-rooms')
      let spaceFull = $(this).attr('data-area-full')
      let spaceWithoutBalc = $(this).attr('data-area-live')
      let sqmtPrice = $(this).attr('data-cost-m2')
      let totalPrice = $(this).attr('data-cost-total')
      let img = $(this).attr('data-plan-img')
      let statusName = $(this).attr('data-status-name')
      Swal.fire({
        width: '70%',
        title: 'Квартира №' + number,
        html: '<hr>' +
          '<div class="row">' +
          '<div class="col">' +
          '	<img src="/images/flat_plans/' + img + '" width="300" height="400" alt="">' +
          '</div>' +
          '<div class="col">' +
          '<div class="row">' +
          '	<div class="col">' +
          '		Объект: ЖК "' + complex + '", Дом ' + liter +
          '	</div>' +
          '</div>' +
          '<div class="row">' +
          '	<div class="col">' +
          '		Подъезд: ' + entrance + ', Этаж: ' + floor +
          '	</div>' +
          '</div>' +
          '<hr>' +
          '<div class="row">' +
          '	<div class="col">' +
          '		Количество комнат: ' + rooms +
          '	</div>' +
          '</div>' +
          '<div class="row">' +
          '	<div class="col">' +
          '		Общая площадь: ' + spaceFull + ', площадь без балкона: ' + spaceWithoutBalc +
          '	</div>' +
          '</div>' +
          '<hr>' +
          '<div class="row">' +
          '	<div class="col">' +
          '		Цена за квадратный метр: ' + sqmtPrice + ', Общая стоимость: ' + totalPrice +
          '	</div>' +
          '</div>' +
          '<hr>' +
          '<div class="row">' +
          '	<div class="col">' +
          '		Статус: ' + statusName +
          '	</div>' +
          '</div>' +
          '</div>' +
          '</div>',
        showCancelButton: true,
        confirmButtonText: `Открыть запись`,
        cancelButtonText: `Закрыть`,
      }).then((result) => {

        if (result.isConfirmed) {
          window.location.href = '/flats-form?flat_id=' + flat_id;
        }
      })

    });

  });
</script>

<script>
  $(document).ready(function() {
    $('.DoCopyVertical').click(function(e) {
      let flat_id = $(this).attr('data-flat-id')
      $.ajax({
        type: "post",
        url: "core/view/desktop/Flats/copyFlats.php",
        data: {
          flat_id: flat_id,
        },
        success: function(response) {
          Swal.fire({
            title: response.text,
          })

        }
      });
    })
  })
</script>

<style>
  /* *,
  *::before,
  *::after {
    box-sizing: border-box;
  } */

  .tabs {
    /* font-size: 0; */
    margin-left: auto;
    margin-right: auto;
  }

  .tabs>input[type="radio"] {
    display: none;
  }

  .tabs>div {
    /* скрыть контент по умолчанию */
    display: none;
    border: 1px solid #e0e0e0;
    padding: 10px 15px;
    /* font-size: 14px; */
  }

  /* отобразить контент, связанный с вабранной радиокнопкой (input type="radio") */
  #tab-btn-1:checked~#content-1,
  #tab-btn-2:checked~#content-2{
    display: block;
  }

  .tabs>label {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: #f5f5f5;
    border: 1px solid #e0e0e0;
    padding: 2px 8px;
    font-size: 16px;
    line-height: 1.5;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out;
    cursor: pointer;
    position: relative;
    top: 1px;
  }

  .tabs>label:not(:first-of-type) {
    border-left: none;
  }

  .tabs>input[type="radio"]:checked+label {
    background-color: #fff;
    border-bottom: 1px solid #fff;
  }
  .btn{
    font-size: 16px;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-left: 12px;
    padding-right: 12px;
  }
</style>