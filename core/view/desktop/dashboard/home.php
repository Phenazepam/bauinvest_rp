<?php 

    use RedCore\Users\Collection as Users;
    Users::setObject("user");
    $users = Users::getList();
    
    use RedCore\Contract\Collection as Contract;
    Contract::setObject();
    $Contract = Contract::getList();

    use RedCore\SaleObject\Collection as SaleObject;
    SaleObject::setObject();
    $SaleObject = SaleObject::getList();

    use RedCore\Promotion\Collection as Promotion;
    Promotion::setObject();
    $Promotion = Promotion::getList();

    $reestr_arr = array(
        array(
            "title"         => "Реестр пользователей",
            "url"           => "users-list",
            "icon"          => "fa-user",
            "count"         => count($users),
            "percent"       => "&nbsp;",
            "perccent_text" => "&nbsp;",
        ),
        
        array(
            "title"         => "Реестр договоров",
            "url"           => "contract-list",
            "icon"          => "fa-file-text",
            "count"         => count($Contract),
            "percent"       => "&nbsp;",
            "perccent_text" => "&nbsp;",
        ),
        
        array(
            "title"         => "Реестр объектов продажи",
            "url"           => "saleobject-list",
            "icon"          => "fa-university",
            "count"         => count($SaleObject),
            "percent"       => "&nbsp;",
            "perccent_text" => "&nbsp;",
        ),
        
        array(
            "title"         => "Реестр акций",
            "url"           => "promotion-list",
            "icon"          => "fa-tags",
            "count"         => count($Promotion),
            "percent"       => "&nbsp;",
            "perccent_text" => "&nbsp;",
        ),
    );
?>

<!-- top tiles -->
<div class="row" style="display: inline-block;" >
  <div class="tile_count">
  	<?php 
  	     $i = 0;
  	     foreach($reestr_arr as $item):
  	?>
    <div class="col-md-4 col-sm-4  tile_stats_count">
    <a href="/<?=$item["url"]?>">
      <span class="count_top"><i class="fa <?=$item["icon"]?>"></i> <?=$item["title"]?></span>
      <div class="count"><?=$item["count"]?></div>
      <span class="count_bottom"><i class="green"><?=$item["percent"]?> </i> <?=$item["percent_text"]?></span>
    </a>
    </div>
    
    <?php 
        endforeach;
    ?>
    
  </div>
</div>
  <!-- /top tiles -->
