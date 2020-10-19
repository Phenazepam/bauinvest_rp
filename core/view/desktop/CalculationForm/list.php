<?php

use \RedCore\calculationform\Collection as calculationform;
use \RedCore\Where as Where;

calculationform::setObject("calculationform");

$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();

$items = calculationform::getList($where);
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Формы расчета<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/calculationform-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Форма расчета</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item):
                          $oFS = $item->getFieldSet("calculationform-list");
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
                              <a class="dropdown-item" href="/calculationform-form?calculationform_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/calculationform-list?action=calculationform.delete.do&calculationform[id]=<?=$oFS->id?>">Удалить</a>
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




		


		