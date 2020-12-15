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

use \RedCore\ExpenditureFirst\Collection as ExpenditureFirst;
use \RedCore\Where as Where;

ExpenditureFirst::setObject("expenditurefirst");

function GetExpenditureItems($pid = 0)
{
    $where = Where::Cond()
        ->add("_deleted", "=", "0")
        ->add("and")
        ->add("pid", "=", $pid)
        ->parse();

    $items = ExpenditureFirst::getList($where);
    return $items;
}

?>

<style>
    @import "core/view/desktop/Budget/ExpenditureTree/ExpenditureTreeStyles.css";
</style>
<!-- <script src="core/view/desktop/Budget/ExpenditureTree/ExpenditureTreeScript.js">
</script> -->
<form method="post" id="expenditureTree" enctype="multipart/form-data" name="bankescrow">
    <div onclick="tree_toggle(arguments[0])" >
        <div>
            <h1>Статьи расхода</h1>
        </div>
        <input type="text" name="test">
        <ul class="Container">
            <?php
            $firstItems = GetExpenditureItems(0);

            foreach ($firstItems as $key => $first) :
                /* var_dump($first);
                echo '<br>';
                var_dump($first == array_pop($firstItems)); */

                if ($first != end($firstItems)) :
            ?>
                    <li class="Node IsRoot ExpandClosed">
                        <div class="Expand"></div>
                        <input type="checkbox" name="<?= $first->object->id ?>" value="<?= $first->object->id ?>" class="tree_parent"/>
                        <div class="Content"><?= $first->object->title ?></div>

                    <?php else : ?>
                    <li class="Node IsRoot ExpandClosed IsLast">
                        <div class="Expand"></div>
                        <input type="checkbox" name="<?= $first->object->id ?>" value="<?= $first->object->id ?>" class="tree_parent"/>
                        <div class="Content"><?= $first->object->title ?></div>
                    <?php endif ?>

                    <ul class="Container">
                        <?php
                        $secondItems = GetExpenditureItems($first->object->id);
                        foreach ($secondItems as $key => $second) :
                            if ($second != end($secondItems)) :
                        ?>
                                <li class="Node ExpandClosed">
                                    <div class="Expand"></div>
                                    <input type="checkbox" name="<?= $second->object->id ?>" value="<?= $second->object->id ?>" class="tree_child"/>
                                    <div class="Content"><?= $second->object->title ?></div>
                                <?php else : ?>
                                <li class="Node ExpandClosed IsLast">
                                    <div class="Expand"></div>
                                    <input type="checkbox" name="<?= $second->object->id ?>" value="<?= $second->object->id ?>" class="tree_child"/>
                                    <div class="Content"><?= $second->object->title ?></div>
                                <?php endif ?>

                                <ul class="Container">
                                    <?php foreach (GetExpenditureItems($second->object->id) as $key => $third) : ?>
                                        <li class="Node ExpandLeaf IsLast">
                                            <div class="Expand"></div>
                                            <input type="checkbox" name="<?= $third->object->id ?>" value="<?= $third->object->id ?>"/>
                                            <div class="Content"><?= $third->object->title ?></div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                                </li>
                            <?php endforeach ?>

                    </ul>
                    </li>
                <?php endforeach ?>

        </ul>
    </div>
</form>