<?php

use \RedCore\Autos\Collection as Autos;
use \RedCore\Where as Where;

Autos::setObject("auto");

$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();

$items = Autos::getList($where);
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>АВТОМОБИЛИ<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/autos-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Наименование</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item): 
                            $oFS = $item->getFieldSet("autos-list");
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
                              <a class="dropdown-item" href="/autos-form?auto_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/autos-list?action=auto.delete.do&auto[id]=<?=$oFS->id?>">Удалить</a>
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




		


		