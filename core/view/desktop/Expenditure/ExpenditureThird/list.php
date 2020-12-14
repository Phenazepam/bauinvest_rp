<?php

use \RedCore\ExpenditureSecond\Collection as ExpenditureSecond;
use \RedCore\ExpenditureThird\Collection as ExpenditureThird;
use \RedCore\Where as Where;
use \RedCore\Session as Session;


ExpenditureThird::setObject("expenditurethird");
Session::bind("expendituresecond_id", "filter_expendituresecond_id", -1);

$pid = Session::get("filter_expendituresecond_id");

$where = Where::Cond()
  ->add("_deleted", "=", "0")
  ->add("and")
  ->add("pid", "=", $pid)
  ->parse();

$items = ExpenditureThird::getList($where);

$where = Where::Cond()
  ->add("_deleted", "=", "0")
  ->add("and")
  ->add("id", "=", $pid)
  ->parse();

$parent = ExpenditureSecond::getList($where);
$parent_title = array_shift($parent)->object->title;
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>СТАТЬИ РАСХОДА (подпункты для <?= $parent_title ?>)<small>реестр записей</small></h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">

              <a class="btn btn-primary" href="/expenditurethird-form">Добавить <i class="fa fa-plus"></i></a>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>№ п/п</th>
                    <th>Статья расхода</th>
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i =  1;

                  foreach ($items as $key => $item) :
                    $oFS = $item->getFieldSet("expenditurethird-list");
                  ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $oFS->title ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Действия
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/expenditurethird-list?expenditurethird_id=<?= $oFS->id ?>">Открыть</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/expenditurethird-form?expenditurethird_id=<?= $oFS->id ?>">Редактировать</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/expenditurethird-list?action=expenditurethird.delete.do&expenditurethird[id]=<?= $oFS->id ?>">Удалить</a>
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