<?php

use \RedCore\agency\Collection as agency;
use \RedCore\Where as Where;

agency::setObject("agency");

$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();

$items = agency::getList($where);
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>АГЕНСТВА НЕДВИЖИМОСТИ<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/agency-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Юридическое название</th>
                          <th>Коммерческое название</th>
                          <th>ИНН</th>
                          <th>Процент вознаграждения</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item):
                          $oFS = $item->getFieldSet("agency-list");
                      ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$oFS->title?></td>
                          <td><?=$oFS->comName?></td>
                          <td><?=$oFS->inn?></td>
                          <td><?=$oFS->paymentProcent?></td>

                          <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Действия
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/agency-form?agency_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/agency-list?action=agency.delete.do&agency[id]=<?=$oFS->id?>">Удалить</a>
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




		


		