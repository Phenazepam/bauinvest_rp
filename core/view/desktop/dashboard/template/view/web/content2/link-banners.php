<div class="title-line">
	<div class="title">ССЫЛКИ</div>
</div>
<style>
#link-banner {
    margin-top: 0px; 
    text-align: left;
}

#link-logo {
	margin: 0px 0px 10px 0px;
}
</style>
<?php 
	foreach(Content::$link_banners as $event_banner) {
		$ext_id    = $event_banner["id"];
		$ext_logo  = $event_banner["logo"];
		$ext_link  = $event_banner["link"];
?>
		
		<style>
		.<? echo $ext_id;?>_prop1 {
			background: <?php echo $ext_bg1;?>;
			color: <?php echo $ext_tc1;?>; 
		}
		
		.<? echo $ext_id;?>_prop2 {
			background: <?php echo $ext_bg2;?>;
			color: <?php echo $ext_tc2;?>;
		}
		
		.<?  echo $ext_id;?>_prop3 {
			background: <?php echo $ext_bg3;?>;
			color: <?php echo $ext_tc3;?>;
		}
		
		</style>
		<?php
			$event_date = $ext_date;
			$days = floor((strtotime($event_date) - strtotime("now")) / 86400);
			$hours = floor( (strtotime($event_date) - strtotime("now") - $days * 86400) / 3600);
			$minutes = floor( (strtotime($event_date) - strtotime("now") - $days * 86400 - $hours * 3600) / 60);
		?>
		
		<div id="link-banner" class="banner w220">
			<div class="row">
				<div id="link-logo" class="column-h w220">
					<a href="<?php echo $ext_link;?>"><img src="<?php echo $ext_logo;?>"></a>
				</div>
			</div>
		</div>

<?php 	
	}
?>
