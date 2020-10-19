<div id="blind-version-link">
<?php if ($_SESSION["contrast-scheme"]) {?>
	<div><a href="?normal-scheme">Полная версия</a></div>
	<div>
		<a href="?font=18" style="font-size: 18px !important; margin: 0px 10px 0px 10px">A</a>
		<a href="?font=22" style="font-size: 22px !important; margin: 0px 10px 0px 10px">A</a>
		<a href="?font=26"  style="font-size: 26px !important; margin: 0px 10px 0px 10px">A</a>
		<a href="?font=0"  style="font-size: 18px !important; margin: 0px 10px 0px 10px">Сброс</a>
	</div>
<?php } else {?>
	<a href="?contrast-scheme">Версия для слабовидящих</a>
<?php } ?>
</div>