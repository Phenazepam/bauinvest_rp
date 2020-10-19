<?php

use \RedCore\partner\Collection as partner;
use \RedCore\Where as Where;

partner::setObject("partner");

$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();

$items = partner::getList($where);
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Контрагенты<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/partner-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>ФИО</th>
                          <th>Номер телефона</th>
                          <th>Электронная почта</th>
                          <th>Контракт</th>
                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item):
                          $oFS = $item->getFieldSet("partner-list");
                      ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$oFS->f?> <?=$oFS->i?> <?=$oFS->o?></td>
                          <td><?=$oFS->phoneNumber?></td>
                          <td><?=$oFS->email?></td>
                          <td><?=$oFS->connectionToContract?></td>

                          <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Действия
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/partner-form?partner_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/partner-list?action=partner.delete.do&partner[id]=<?=$oFS->id?>">Удалить</a>
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




		


		