<?php

use \RedCore\Expenditure\Collection as Expenditure;
use \RedCore\Where as Where;
use \RedCore\Session as Session;


Expenditure::setObject("expenditure");

$where = Where::Cond()
  ->add("_deleted", "=", "0")
  ->parse();

$items = Expenditure::getList($where);



$list_ready = array();
foreach($items as $item) {
  $list_ready["tree"][] = array(
    "id" => $item->object->id,
		"title" => $item->object->title,
    "pid" => $item->object->pid,
    "sort" => $item->object->sort
  );
};
// print_r($list_ready);

function getExpTree($items = array(), $pid = 0, $lvl = 0) {
  $lvl++;
	$_tmp  = array();
  $children = array();

	foreach($items as $item) {
		if($pid == $item["pid"]) {
      // $item["children"] = getTree($items, $item["expenditure_id"]);
      $item["lvl"] = $lvl;
      $children = getExpTree($items, $item["id"], $lvl);
      $_tmp[] = $item;
      $_tmp = array_merge($_tmp, $children);
		}
	}
	
	return $_tmp;
}

$expTree = getExpTree($list_ready["tree"]);

print_r($t);
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>СТАТЬИ РАСХОДА<small>реестр записей</small></h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">

              <a class="btn btn-primary" href="/expenditure-form?pid=0">Добавить корневой элемент<i class="fa fa-plus"></i></a>
              <table id="datatable" class="table table-bordered" style="width:100%">
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
                  $sort = 0;
                  $lvl = 0;

                  foreach ($expTree as $key => $item) :
                    // $oFS = $item->getFieldSet("expenditure-list");
                    // var_dump($item);
                    if(0 == $item["pid"]){
                      $sort = $item["sort"];
                      $lvl = $item["lvl"];
                    }
                    else{
                      if($item["lvl"] > $lvl){
                        $sort = $sort.'.'.$item["sort"];
                        $lvl = $item["lvl"];
                      }
                      elseif($item["lvl"] == $lvl){
                        $sort = substr($sort, 0, strlen($sort)-2).'.'.$item["sort"];
                        $lvl = $item["lvl"];
                      }
                      elseif($item["lvl"] < $lvl){
                        $diff =  ($lvl - $item["lvl"])*4;
                        $sort = substr($sort, 0, strlen($sort)-$diff).'.'.$item["sort"];
                        $lvl = $item["lvl"];
                      }
                    }
                    
                  ?>
                    <tr>
                      <?php 
                        if(1 == $item["lvl"]):
                      ?>
                      <td style="padding-left: <?= $item["lvl"]*10 ?>px;"><h3><?= $sort ?></h3></td>
                      <td style="padding-left: <?= $item["lvl"]*10 ?>px;"><h3><?= $item["title"] ?></h3></td>
                      <?php 
                        elseif(2 == $item["lvl"]):
                      ?>
                      <td style="padding-left: <?= $item["lvl"]*10 ?>px;"><h5><?= $sort ?></h5></td>
                      <td style="padding-left: <?= $item["lvl"]*10 ?>px;"><h5><?= $item["title"] ?></h5></td>
                      <?php 
                        else:
                      ?>
                      <td style="padding-left: <?= $item["lvl"]*10 ?>px;"><?= $sort ?></td>
                      <td style="padding-left: <?= $item["lvl"]*10 ?>px;"><?= $item["title"] ?></td>
                      <?php endif; ?>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Действия
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/expenditure-form?expenditure_id=<?= $oFS->id ?>">Редактировать</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/expenditurefirst-list?action=expenditurefirst.delete.do&expenditurefirst[id]=<?= $oFS->id ?>">Удалить</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/expenditure-form?pid=<?= $item["id"] ?>">Добавить подпункт</a>
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