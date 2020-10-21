<?php

use \RedCore\promotion\Collection as promotion;
use \RedCore\Where as Where;

promotion::setObject("promotion");

$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();

$items = promotion::getList($where);
//var_dump($items);
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>АКЦИИ<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/promotion-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Наименование акции</th>
                          <th>Дата начала</th>
                          <th>Дата окончания</th>
                          <th>Размер скидки</th>
                          <th>Действующая</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item):
                          $oFS = $item->getFieldSet("promotion-list");
                          //var_dump($oFS);
                      ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$oFS->title?></td>
                          <td><?=$oFS->startDate?></td>
                          <td><?=$oFS->finishDate?></td>
                          <td><?=$oFS->discountAmount?></td>
                          <td><?=$oFS->isActive?></td>
                          <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Действия
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/promotion-form?promotion_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/promotion-list?action=promotion.delete.do&promotion[id]=<?=$oFS->id?>">Удалить</a>
                            </div>
                          </div>
                          </td>
                        </tr>
                       <?
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




		


		