<!-- <script type="text/javascript">
    function tree_toggle(event) {
        event = event || window.event
        var clickedElem = event.target || event.srcElement

        if (!hasClass(clickedElem, 'Expand')) {
            return // клик не там
        }

        // Node, на который кликнули
        var node = clickedElem.parentNode
        if (hasClass(node, 'ExpandLeaf')) {
            return // клик на листе
        }

        // определить новый класс для узла
        var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
        // заменить текущий класс на newClass
        // регексп находит отдельно стоящий open|close и меняет на newClass
        var re = /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
        node.className = node.className.replace(re, '$1' + newClass + '$3')
    }


    function hasClass(elem, className) {
        return new RegExp("(^|\\s)" + className + "(\\s|$)").test(elem.className)
    }
</script> -->


<?php

use \RedCore\Expenditure\Collection as Expenditure;
use \RedCore\Where as Where;

Expenditure::setObject("expenditure");

function GetExpenditureItems($pid = 0)
{
  $where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->add("and")
    ->add("pid", "=", $pid)
    ->parse();

  $items = Expenditure::getList($where);
  return $items;
}

?>

<style>
  @import "core/view/desktop/Budget/ExpenditureTree/ExpenditureTreeStyles.css";
</style>
<!-- <script src="core/view/desktop/Budget/ExpenditureTree/ExpenditureTreeScript.js">
</script> -->
<!-- <style>
  [name="Tree"] fieldset {
    border: none;
    text-align: left;
  }

  [name="Tree"] label:after {
    content: '\A';
    white-space: pre;
  }

  /* после label идёт как бы br */

  /* если нужно скрыть дочерние чекбоксы, если на родителе не стоит флажок или :indeterminate*/

  [name="Tree"] fieldset fieldset {padding-left: 20px; display: block;}  
  [name="Tree"] [type="checkbox"]:checked + label + fieldset,
  [name="Tree"] [type="checkbox"]:indeterminate + label + fieldset {display: block;}
</style>

<form name="Tree">
  <fieldset>
    <label><input type="checkbox"> 1</label>
    <label><input type="checkbox"> 2</label>
    <fieldset>
      <label><input type="checkbox"> 2.1</label>
      <fieldset>
        <label><input type="checkbox"> 2.1.1</label>
        <fieldset><label><input type="checkbox"> 2.1.1.1</label>
          <label><input type="checkbox"> 2.1.1.2</label>
          <label><input type="checkbox"> 2.1.1.3</label>
        </fieldset>
        <label><input type="checkbox"> 2.1.2</label>
        <label><input type="checkbox"> 2.1.3</label>
      </fieldset>
      <label><input type="checkbox"> 2.2</label>
      <label><input type="checkbox"> 2.3</label>
      <label><input type="checkbox"> 2.4</label>
    </fieldset>
    <label><input type="checkbox"> 3</label>
    <fieldset>
      <label><input type="checkbox"> 3.1</label>
      <label><input type="checkbox"> 3.2</label>
      <label><input type="checkbox"> 3.3</label>
    </fieldset>
  </fieldset>
</form> -->
<form method="post" id="expenditureTree" enctype="multipart/form-data" name="Tree">
  <div onclick="tree_toggle(arguments[0])">
    <div>
      <h1>Статьи расхода</h1>
    </div>
    <ul class="Container">
      <fieldset>
        <?php
        $firstItems = GetExpenditureItems(0);

        foreach ($firstItems as $key => $first) :
          if ($first != end($firstItems)) :
        ?>
            <!-- Элемент Первого уровня -->
            <li class="Node IsRoot ExpandClosed">
              <div class="Expand"></div>
              <input type="checkbox" name="<?= $first->object->id ?>" value="<?= $first->object->id ?>" />
              <div class="Content"><?= $first->object->title ?></div>
              <fieldset>
              <?php else : ?>
                <!-- Последний Элемент Первого уровня -->
            <li class="Node IsRoot ExpandClosed IsLast">
              <div class="Expand"></div>
              <input type="checkbox" name="<?= $first->object->id ?>" value="<?= $first->object->id ?>" id="parent_<?= $first->object->id ?>" onchange="checkboxClick('#parent_<?= $first->object->id ?>','.child_<?= $first->object->id ?>');" />
              <div class="Content"><?= $first->object->title ?></div>
              <fieldset>
              <?php endif ?>

              <ul class="Container">
                <?php
                $secondItems = GetExpenditureItems($first->object->id);
                foreach ($secondItems as $key => $second) :
                  if ($second != end($secondItems)) :
                ?>
                    <!-- Элемент второго уровня -->
                    <li class="Node ExpandClosed">
                      <div class="Expand"></div>
                      <input type="checkbox" name="<?= $second->object->id ?>" value="<?= $second->object->id ?>" class="child_<?= $first->object->id ?>" id="parent_<?= $second->object->id ?>" onchange="checkboxClick('#parent_<?= $second->object->id ?>','.child_<?= $second->object->id ?>');" />
                      <div class="Content"><?= $second->object->title ?></div>
                      <fieldset>
                      <?php else : ?>
                        <!-- Последний Элемент второго уровня -->
                    <li class="Node ExpandClosed IsLast">
                      <div class="Expand"></div>
                      <input type="checkbox" name="<?= $second->object->id ?>" value="<?= $second->object->id ?>" class="child_<?= $first->object->id ?>" />
                      <div class="Content"><?= $second->object->title ?></div>
                      <fieldset>
                      <?php endif ?>

                      <ul class="Container">
                        <?php foreach (GetExpenditureItems($second->object->id) as $key => $third) : ?>
                          <!-- Элемент третьего уровня -->
                          <li class="Node ExpandLeaf IsLast">
                            <div class="Expand"></div>
                            <input type="checkbox" name="<?= $third->object->id ?>" value="<?= $third->object->id ?>" class="child_<?= $second->object->id ?>" />
                            <div class="Content"><?= $third->object->title ?></div>
                          </li>
                        <?php endforeach ?>
                      </ul>
                      </fieldset>
                    </li>
                  <?php endforeach ?>

              </ul>
              </fieldset>
            </li>
          <?php endforeach ?>

    </ul>
  </div>
  </fieldset>
</form>