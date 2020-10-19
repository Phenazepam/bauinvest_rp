<?php  
	if (isset($_REQUEST["nid"])) : 
	$node = Content::$news[$_REQUEST["nid"]];
?>

<h1 class="RCB h1"><?=$node["title"]?></h1>
        
<time class="n-sngl-date"><?=$node["date"]?></time>

<img class="n-sngl-img" src="<?=$node["photo"]?>" alt="<?=$node["title"]?>">

<p class="n-sngl-p"><?=$node["full"]?></p>


<a href="/news" class="bttn1">Все новости</a>

<? else: ?>
<section class="section">
	<h2 class="RCB h2">Новости</h2>
	<div class="n-wr">
		<? foreach(Content::$news as $indx => $news_item ): ?>
	
		<article class="n-it">
			<time class="n-date"><?=$news_item["date"]?></time>
			<h3 class="RCB n-ttl"><?=$news_item["title"]?></h3>
			<div class="n-img-wr">
				<?php if("" != $news_item["photo"]):?>
				<img src="<?=$news_item["photo"]?>" alt="<?=$news_item["title"]?>" class="n-img"/>
				<?php endif;?>
			</div>
			<div class="n-desk">
				<p class="n-desk-p"><?=$news_item["anons"]?></p>
				<a href="/news?nid=<?=$indx?>" class="n-a">Подробнее</a>
			</div>
		</article>
		
		<? endforeach; ?>
	</div>
</section>
<? endif; ?>