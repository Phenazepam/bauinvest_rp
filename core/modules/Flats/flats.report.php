<?
use \RedCore\Buildings\Collection as Buildings;
use \RedCore\Flats\Collection as Flats;
use \RedCore\ObjectStatus\Collection as ObjectStatus;
use \RedCore\Flats\ChessTower as ChessTower;
use RedCore\Request as Request;
use \RedCore\Where as Where;
use \RedCore\Flats\CopyFlats as Copy;
use \RedCore\Session as Session;

$id_b = Session::get("filter_building_id");

$lb_params = array(
	"id_b" => $id_b,
);
$lb_params_b = array(
	"id" => $id_b,
);

Buildings::setObject("building");
$temp = Buildings::loadBy($lb_params_b);

ObjectStatus::setObject();
$ObjectStatus = ObjectStatus::getList();

Flats::setObject("flat");

$where = Where::Cond()
	->add("id_b", "=", $id_b)
	->add('and')
	->add("_deleted", "=", "0")
    ->parse();

$items = Flats::getList($where);


//var_dump($items);
$complex = $temp->object->complex;
$liter = $temp->object->liter;
$entrance = $temp->object->entrance;
$id_b = $temp->object->id;
$row = $temp->object->params->levels;
$col = $temp->object->params->flatsOnLvl;

?>
<style>
</style>
<html>
    <header>
    </header>
    <body>        
        <div class="row">
            <div class="col">
              <h3>Квартиры Отчет</h3>
              <h2>ЖК "<?=$complex?>" Литер <?=$liter?> Подъезд №<?=$entrance?>             
                <div class="row">
                    <div class="col-sm-12">
                        <div class="">
                            
                            <table id="" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style= "border: 1px solid black; text-align: center;">№ п/п</th>
                                        <th style= "border: 1px solid black; text-align: center;">Статус квартиры</th>
                                        <th style= "border: 1px solid black; text-align: center;">Номер квартиры</th>
                                        <th style= "border: 1px solid black; text-align: center;">Число комнат</th>
                                        <th style= "border: 1px solid black; text-align: center;">Общая площадь</th>
                                        <th style= "border: 1px solid black; text-align: center;">Площадь без балкона</th>
                                        <th style= "border: 1px solid black; text-align: center;">Цена за кв.м.</th>
                                        <th style= "border: 1px solid black; text-align: center;">Общая стоимость</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i =  1;
                                    
                                    foreach($items as $key => $item): 
                                        
                                        $oFS = $item->getFieldSet("flats-list");
                                        
                                        
                                        ?>
                                    <tr>
                                        <td style="border: 1px solid black; text-align: center;"><?=$i++?></td>
                                        <td style="border: 1px solid black; text-align: center;"><?=$ObjectStatus[$oFS->flatStatus]->object->title?></td>
                                        <td style="border: 1px solid black; text-align: center;"><?=$oFS->number?></td>
                                        <td style="border: 1px solid black; text-align: center;"><?=$oFS->rooms?></td>
                                        <td style="border: 1px solid black; text-align: center;"><?=$oFS->spaceFull?></td>
                                        <td style="border: 1px solid black; text-align: center;"><?=$oFS->spaceWithoutBalc?></td>
                                        <td style="border: 1px solid black; text-align: center;"><?=$oFS->sqmtPrice?></td>
                                        <td style="border: 1px solid black; text-align: center;"><?=$oFS->totalPrice?></td>
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
    </body>
</html>


