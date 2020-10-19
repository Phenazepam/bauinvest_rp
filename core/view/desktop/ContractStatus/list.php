<?php

use \RedCore\contractstatus\Collection as contractstatus;
use \RedCore\Where as Where;

contractstatus::setObject("contractstatus");

$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();

$items = contractstatus::getList($where);
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>СТАТУСЫ ДОГОВОРА<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/contractstatus-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Статус договора</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item):
                          $oFS = $item->getFieldSet("contractstatus-list");
                      ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$oFS->title?></td>
                          <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Действия
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/contractstatus-form?contractstatus_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/contractstatus-list?action=contractstatus.delete.do&contractstatus[id]=<?=$oFS->id?>">Удалить</a>
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




		


		