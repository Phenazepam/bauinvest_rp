<div class="title-line">
	<div class="title-full">НОВОСТИ</div>
</div>
<div id="news">
	<?php  
		if (isset($_REQUEST["nid"])) { 
		$node = Content::$news[$_REQUEST["nid"]];
	?>
	<ul class="news-list">
		<li class="news-node">
			<img class="full" src="<?php echo $node["photo"];?>">
			<h2><?php echo $node["title"];?></h2>
			<p><?php echo $node["full"];?></p>
		</li>
	</ul>
		<a href="/news">ВСЕ НОВОСТИ</a>
	<?php } else { ?>
	<ul class="news-list">
		<?php 
			foreach(Content::$news as $indx => $node):
		?>
		<li class="news-node">
			<img src="<?php echo $node["photo"];?>">
			<h2><a href="/news?nid=<?php echo $indx;?>"><?php echo $node["title"];?></a></h2>
			<p><?php echo $node["anons"];?></p>
			<div class="clear"></div>
		</li>	
		<?php 		
			endforeach; 
		?>	
	</ul>
	<div class="clear"></div>
	<?php } ?>
</div>