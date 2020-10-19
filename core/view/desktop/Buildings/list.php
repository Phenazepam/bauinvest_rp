<?php

use \RedCore\Buildings\Collection as Buildings;
use \RedCore\Where as Where;

Buildings::setObject("building");
$where = Where::Cond()->add("_deleted", "=", "0")->parse();
$items = Buildings::getList($where);
//print_r($items);
/* Users::setObject("user");
$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();

$items = Users::getList($where); */
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ПОМЕЩЕНИЯ<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/buildings-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Жилой комплекс</th>
                          <th>Литер</th>
                          <th>Подъезд</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item): 
                          $oFS = $item->getFieldSet("buildings-list");
                          //var_dump($oFS);
                           
                      ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$oFS->complex?></td>
                          <td><?=$oFS->liter?></td>
                          <td><?=$oFS->entrance?></td>
                          <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Действия
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/flats-list?building_id=<?=$oFS->id?>">Открыть</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/buildings-form?building_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/buildings-list?action=building.delete.do&building[id]=<?=$oFS->id?>">Удалить</a>
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