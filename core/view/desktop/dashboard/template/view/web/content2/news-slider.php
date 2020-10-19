<div class="title-line">
	<div class="title">НОВОСТИ</div>
	<div class="title-to-all"><a href="/news">ВСЕ НОВОСТИ</a></div>
</div>
<div id="news">
	<div class="row h313" id="news-slider-block">
		<div class="column w748">
			<ul class="adaptive-slider" id="news-slider">
				<?php 
					foreach(Content::$news as $indx => $node):
						if($indx > 4) break;  
				?>
				<li>
					<figure>
						<img src="<?php echo $node["photo"];?>">
						<figcaption>
							<h2><?php echo $node["title"];?></h2>
							<p><?php echo $node["anons"];?></p>
						</figcaption>
					</figure>
				</li>	
				<?php 		
					endforeach; 
				?>	
			</ul>
		</div>
	</div>
	<div class="row">
		<?php 
			foreach(Content::$news as $indx => $node):
				if($indx > 4) break;
		?>
		<div class="column-h w149">
			<p class="date"><?php echo $node["date"];?></p>
			<p class="title"><a href="/news?nid=<?php echo $indx;?>"><?php echo $node["title"];?></a></p>
			<p class="anons"><?php echo $node["anons"];?></p>
		</div>	
		<?php 		
			endforeach; 
		?>	
	</div>
	<div class="clear"></div>
</div>	