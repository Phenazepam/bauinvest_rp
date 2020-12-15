<?php

use \RedCore\Liter\Collection as Liter;
use \RedCore\Where as Where;

Liter::setObject("liter");
$where = Where::Cond()->add("_deleted", "=", "0")->parse();
$items = Liter::getList($where);
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
        <h2>Литеры<small>реестр записей</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <a class="btn btn-primary" href="/liter-form">Добавить <i class="fa fa-plus"></i></a>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>№ п/п</th>
                    <th>Жилой комплекс</th>
                    <th>Литер</th>
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i =  1;

                  foreach ($items as $key => $item) :
                    $oFS = $item->getFieldSet("liter-list");
                    //var_dump($oFS);

                  ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $oFS->title ?></td>
                      <td><?= $oFS->complex ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Действия
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/bankescrow-list?liter_id=<?= $oFS->id ?>">Открыть</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/liter-form?liter_id=<?= $oFS->id ?>">Редактировать</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/liter-list?action=liter.delete.do&liter[id]=<?= $oFS->id ?>">Удалить</a>
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