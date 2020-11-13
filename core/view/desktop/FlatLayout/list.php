<?php

use \RedCore\FlatLayout\Collection as FlatLayout;
use \RedCore\Where as Where;
use RedCore\Session as Session;
use RedCore\Buildings\Collection as Buildings;

$id_b = Session::get("filter_building_id");
FlatLayout::setObject("flatLayout");
$imgs = FlatLayout::getListImages($id_b);
$dir = "/images/flat_plans/";

$lb_params_b = array(
  "id" => $id_b,
);

Buildings::setObject("building");
$temp = Buildings::loadBy($lb_params_b);

$complex = $temp->object->complex;
$liter = $temp->object->liter;
$entrance = $temp->object->entrance;
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ПЛАН КВАРТИРЫ<small>реестр записей</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_title">
        <h2>ЖК "<?= $complex ?>" Литер <?= $liter ?> Подъезд №<?= $entrance ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <form action="/flatlayout-list?action=flatlayout.store.do" method="post" enctype="multipart/form-data">
                <h2>Добавить новую планировку</h2>
                <input type="file" name="flatlayout" id="img">
                <button type="submit" class="btn btn-primary">Добавить</button>
              </form>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>№ п/п</th>
                    <th>План квартиры</th>
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i =  1;
                  foreach ($imgs as $key => $img) :
                    //$oFS = $item->getFieldSet("saletype-list");
                  ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= '<img src="' . $dir . '/' . $id_b . '/' . $img . '" width="150" height="200" alt="">' ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Действия
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/flatlayout-list?action=flatlayout.delete.do&flatlayout[name]=<?= $img ?>&flatlayout[id_b]=<?= $id_b ?>">Удалить</a>
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