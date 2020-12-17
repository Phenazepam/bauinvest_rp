<?php

use \RedCore\BankEscrow\Collection as BankEscrow;
use \RedCore\Where as Where;
use \RedCore\Session as Session;
use \RedCore\Expenditure\Collection as Expenditure;

Session::bind("liter_id", "filter_liter_id", -1);


BankEscrow::setObject("bankescrow");

$liter_id = Session::get("filter_liter_id");

$where = Where::Cond()
  ->add("_deleted", "=", "0")
  ->add("and")
  ->add("liter_id", "=", $liter_id)
  ->parse();

$items = BankEscrow::getList($where);


$test = [
  "1" => "1",
  "0" => "0",
  "asd" => "0"
];

Expenditure::setObject("expenditure");
$exp = Expenditure::getList();
$list_ready = array();
foreach ($items as $item) {
  $list_ready[$liter_id]["tree"][] = array(
    "id" => $item->object->id,
    "liter_id" => $item->object->liter_id,
    "expenditure_id" => $item->object->expenditure_id,
    "budget" => $item->object->budget,
    "paid" => $item->object->paid,
    "rest" => $item->object->rest,
    "title" => $exp[$item->object->expenditure_id]->object->title,
    "pid" => $exp[$item->object->expenditure_id]->object->pid,
    "sort" => $exp[$item->object->expenditure_id]->object->sort,
  );
};

// print_r($list_ready);

/* $list_ready1 = array(
	array(
		"id" => "1", 
		"liter_id" => "1",
		"expenditure_id" => "1",
		"title" => "aqsda",
		"pid" => "0",
		"sort" => "1",
	),
	array(
		"id" => "2", 
		"liter_id" => "1",
		"expenditure_id" => "2",
		"title" => "aqsda",
		"pid" => "1",
		"sort" => "1",
	),
	array(
		"id" => "3", 
		"liter_id" => "1",
		"expenditure_id" => "3",
		"title" => "aqsda",
		"pid" => "1",
		"sort" => "2",
	),
	array(
		"id" => "4", 
		"liter_id" => "1",
		"expenditure_id" => "4",
		"title" => "aqsda",
		"pid" => "1",
		"sort" => "3",
	),
); */


function getTree($items = array(), $pid = 0, $lvl = 0)
{
  $lvl++;
  $_tmp  = array();
  $children = array();

  foreach ($items as $item) {
    if ($pid == $item["pid"]) {
      // $item["children"] = getTree($items, $item["expenditure_id"]);
      $item["lvl"] = $lvl;
      $children = getTree($items, $item["expenditure_id"], $lvl);
      $_tmp[] = $item;
      $_tmp = array_merge($_tmp, $children);
    }
  }

  return $_tmp;
}
// $_tmp = array();
$tree = getTree($list_ready[$liter_id]["tree"]);

?>

<script src="core/view/desktop/Budget/ExpenditureTree/ExpenditureTreeScript.js"></script>

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

              <a class="btn btn-primary" onclick="showTree()" style="color: white; cursor: pointer">Сформировать <i class="fa fa-plus"></i></a>
              <table id="datatable" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>№ п/п</th>
                    <th>Статья расхода</th>
                    <th>Бюждет (руб)</th>
                    <th>Оплачено (руб)</th>
                    <th>Остаток (руб)</th>
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i =  1;

                  // var_dump($tree);
                  foreach ($tree as $key => $item) :
                    if (0 == $item["pid"]) {
                      $sort = $item["sort"];
                      $lvl = $item["lvl"];
                    } else {
                      if ($item["lvl"] > $lvl) {
                        $sort = $sort . '.' . $item["sort"];
                        $lvl = $item["lvl"];
                      } elseif ($item["lvl"] == $lvl) {
                        $sort = substr($sort, 0, strlen($sort) - 2) . '.' . $item["sort"];
                        $lvl = $item["lvl"];
                      } elseif ($item["lvl"] < $lvl) {
                        $diff =  ($lvl - $item["lvl"]) * 4;
                        $sort = substr($sort, 0, strlen($sort) - $diff) . '.' . $item["sort"];
                        $lvl = $item["lvl"];
                      }
                    }
                  ?>
                    <tr>
                      <?php
                      if (1 == $item["lvl"]) :
                      ?>
                        <td style="padding-left: <?= $item["lvl"] * 10 ?>px;">
                          <h3><?= $sort ?></h3>
                        </td>
                        <td style="padding-left: <?= $item["lvl"] * 10 ?>px;">
                          <h3><?= $item["title"] ?></h3>
                        </td>
                      <?php
                      elseif (2 == $item["lvl"]) :
                      ?>
                        <td style="padding-left: <?= $item["lvl"] * 10 ?>px;">
                          <h5><?= $sort ?></h5>
                        </td>
                        <td style="padding-left: <?= $item["lvl"] * 10 ?>px;">
                          <h5><?= $item["title"] ?></h5>
                        </td>
                      <?php
                      else :
                      ?>
                        <td style="padding-left: <?= $item["lvl"] * 10 ?>px;"><?= $sort ?></td>
                        <td style="padding-left: <?= $item["lvl"] * 10 ?>px;"><?= $item["title"] ?></td>
                        <?php endif; ?>
                        <td data-id="<?= $item["id"] ?>" data-type="budget" class="editable"><?= $item["budget"] ?></td>
                        <td data-id="<?= $item["id"] ?>" data-type="paid" class="editable"><?= $item["paid"] ?></td>
                        <td data-id="<?= $item["id"] ?>" data-type="rest" class="editable"><?= $item["rest"] ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Действия
                          </button>
                          <div class="dropdown-menu">
                            <!-- <a class="dropdown-item" href="/calculationform-form?calculationform_id=<?= $oFS->id ?>">Редактировать</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="">Удалить</a>
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

<!-- <script>
  // var tds = document.querySelectorAll('.editable');

  for (let i = 0; i < tds.length; i++) {
    tds[i].addEventListener('click', function func(){
      var input = document.createElement('input');
      input.value = this.innerHTML;
      this.innerHTML = '';
      this.appendChild(input);

      var td = this;
      input.addEventListener('blur', function(){
        td.innerHTML = this.value;
        td.addEventListener('click', func);
      })
      this.removeEventListener('click', func);
    }) 
  }
</script> -->






<script>
let table = document.querySelectorAll('.editable');

let editingTd;

for (let i = 0; i < table.length; i++) {
  table[i].addEventListener('click', function(event) {

    // 3 возможных цели
    let target = event.target.closest('.edit-cancel,.edit-ok,td');

    // if (!table.contains(target)) return;

    if (target.className == 'edit-cancel') {
      finishTdEdit(editingTd.elem, false);
    } else if (target.className == 'edit-ok') {
      finishTdEdit(editingTd.elem, true);
    } else if (target.nodeName == 'TD') {
      if (editingTd) return; // уже редактируется

      makeTdEditable(target);
    }
  })
};

function makeTdEditable(td) {
  editingTd = {
    elem: td,
    data: td.innerHTML
  };

  td.classList.add('edit-td'); // td в состоянии редактирования, CSS применятся к textarea внутри ячейки

  let textArea = document.createElement('textarea');
  textArea.style.width = td.clientWidth + 'px';
  textArea.style.height = td.clientHeight + 'px';
  textArea.className = 'edit-area';

  textArea.value = td.innerHTML.trim();
  td.innerHTML = '';
  td.appendChild(textArea);
  textArea.focus();

  td.insertAdjacentHTML("beforeEnd",
    '<div class="edit-controls"><button class="edit-ok">OK</button><button class="edit-cancel">Отмена</button></div>'
  );
}

function finishTdEdit(td, isOk) {
  if (isOk) {
    td.innerHTML = td.firstChild.value;
  } else {
    td.innerHTML = editingTd.data;
  }
  td.classList.remove('edit-td');
  editingTd = null;
  save(td.dataset.id, td.dataset.type, td.innerHTML);

}

async function  save(id, type, value){
  const data = {
    "id": id,
    "type": type,
    "value": value
  }
  const option = {
    method: "post",
    body: JSON.stringify(data),
  };
  const response = await fetch("/bankescrow-list?action=bankescrow.store.do", option);
  if (response.ok) {
    const res = await response.text();
  }
}
</script>