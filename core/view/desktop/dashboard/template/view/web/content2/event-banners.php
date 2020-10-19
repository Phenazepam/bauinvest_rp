<div class="title-line">
	<div class="title">СОБЫТИЯ</div>
</div>
<?php 
	foreach(Content::$event_banners as $event_banner) {
		$ext_id    = $event_banner["id"];
		$ext_logo  = $event_banner["logo"];
		$ext_title = $event_banner["title"];
		$ext_date  = $event_banner["date"];
		$ext_bg1   = $event_banner["bg1"];
		$ext_bg2   = $event_banner["bg2"];
		$ext_bg3   = $event_banner["bg3"];
		$ext_tc1   = $event_banner["tc1"];
		$ext_tc2   = $event_banner["tc2"];
		$ext_tc3   = $event_banner["tc3"];
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

#contrast-scheme .<? echo $ext_id;?>_prop1 {
	background: #000;
	color: #fff;
}

#contrast-scheme .<? echo $ext_id;?>_prop2 {
	background: #000;
	color: #fff;
}

#contrast-scheme .<?  echo $ext_id;?>_prop3 {
	background: #000;
	color: #fff;
}
</style>
<?php
	$event_date = $ext_date;
	$days = floor((strtotime($event_date) - strtotime("now")) / 86400);
	$hours = floor( (strtotime($event_date) - strtotime("now") - $days * 86400) / 3600);
	$minutes = floor( (strtotime($event_date) - strtotime("now") - $days * 86400 - $hours * 3600) / 60);
?>

<div id="event-banner" class="banner w220 h84">
	<div class="row">
		<div id="top-text"><?php echo $ext_title;?></div>
	</div>
	<div class="row">
		<div id="event-logo" class="column-h">
			<img src="<?php echo $ext_logo;?>">
		</div>
		<div id="days" class="column-h <?php echo $ext_id?>_prop1"><?php echo $days;?></div>
		<div id="hours" class="column-h <?php echo $ext_id?>_prop2"><?php echo $hours;?></div>
		<div id="minutes" class="column-h <?php echo $ext_id?>_prop3"><?php echo $minutes;?></div>
	</div>
	<div class="row">
		<div id="logo-text" class="column-h">&nbsp;</div>
		<div id="days-text" class="column-h">дней</div>
		<div id="hours-text" class="column-h">часов</div>
		<div id="minutes-text" class="column-h">минут</div>
	</div>
</div>

<?php 	
	}
?>
