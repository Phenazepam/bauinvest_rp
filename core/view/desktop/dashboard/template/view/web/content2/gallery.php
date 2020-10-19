<style>
ul.gallery,
ul.gallery li {
	margin: 0px;
	padding: 0px;
	list-style: none;
}

ul.gallery li {
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	display: block;
	float: left;
	margin: 10px;
	width: 226px;
	height: 226px;
	overflow: hidden;
	background: #fff;
	border: 1px solid #ccc;
	text-align: center;
}

ul.gallery li div.link {
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	border: 0px;
	position: relative; 
	padding: 0px; 
	width: 226px; 
	height: 226px; 
	z-index: 2; 
	margin-top: -216px;
}

ul.gallery li div.link a {
	display: block;  
	color: #005872; 
	font-size: 22px;
	font-decoration: none;
	border-bottom: 0px;
	height: 206px;
}

ul.gallery li div.link a div {
	
	border: 1px solid #005872;
	-webkit-border-top-left-radius: 8px;
	-webkit-border-top-right-radius: 8px;
	-moz-border-radius-topleft: 8px;
	-moz-border-radius-topright: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
	position: relative;
	top: 0%;
	min-height: 60px;
	background: rgba(255, 255, 255, 0.9);
	padding: 10px;
	text-transform: uppercase;
} 

ul.gallery li div.icons {
	display: table-cell;
	width: 226px; 
	height: 216px; 
	z-index: 1; 
	padding: 10px 0px 0px 0px;
	overflow: hidden;
	vertical-align: middle;
}

ul.gallery li img {
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	border: 0px;
	max-width: 326px;
	min-width: 100%;
	min-height: 100%;
	cursor: pointer;
	margin: 0px;
}

ul.gallery li img.icon {
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
	margin: 2px;
	width: 30px; 
	min-width: 30px; 
	min-height: 30px; 
	height: 30px;
}

div.pxs_containerbody {
	display: none; 
	position: fixed; 
	width: 100%; 
	height: 100%; 
	top: 0px; 
	left: 0px; 
	background: rgba(255, 255, 255, 0.7);
}

ul.gallery li a.getgallery div.zoom {
	width: 226px;
	height: 226px;
	top: 0px;
	position: relative;
	background: rgba(0, 0, 0, 0.0);
	cursor: pointer;
}

ul.gallery li a.getgallery img {
	margin-top: -226px;
	margin-left: 0px;
}
</style>
<?php 

define(SEP, '/');

function getStrucDir($path = "") {
	$files = scandir($path);
	$rs    = array();
	$lpath = explode(SEP, $path);
	$lpath = array_pop($lpath);
	
	if (count($files) > 0) {
		foreach($files as $file) {
			if (($file != ".")AND($file != "..")) {
				
				if(!is_array($rs[$lpath])) {
					$rs[$lpath] = array();
				}
				
				if(is_dir($path. SEP . $file)) {
					$rs[$lpath] = array_merge($rs[$lpath], getStrucDir($path. SEP . $file));
				}
				else {
					$rs[$lpath][] = $path. SEP . $file;
				}
			}
		}
	}
	
	return $rs;
}

function getArrayNode($keys = array(), $data = array()) {
		foreach($keys as $key) {
			if(isset($data[$key]["data"])) {
				$data = $data[$key]["data"];
			}
			else {
				$data = $data[$key];
			}
		}
		
		return $data;
	}
	
function getGallery($files = array()) {
	$rs = array();
	
	if(!is_array($files)) {
		$files = array();
	}
	
	foreach ($files as $path => $file) {
		if (is_array($file)) {
			$rs[$path] = getGallery($file);
			
			if (isset($rs[$path]['data'])) {
				if (!is_array($rs['thumbs'])) {
					$rs['thumbs'] = array();
				}
				
				$rs['thumbs'] = array_merge($rs['thumbs'], $rs[$path]['data']);
			}
		}	
		else {
			$rs['data'][$path]  = $file;
			$rs['thumbs'][$path] = $file;
		}
	}
	
	return $rs;
}

$varpath = 'settings/csp2';
$vpath1 = 'csp2/gallery';

$path = explode(SEP, $vpath1);
/*
 * goto /files/gallery
 */

$albumUrl = "";

if(isset($_REQUEST["album"])) {
	$albumUrl = $_REQUEST["album"] . ',';
	$album    = explode(',', $_REQUEST["album"]);
	$path     = array_merge($path, $album);
}

$filesa = getStrucDir($varpath);
$files  = getArrayNode($path, $filesa);
$files  = getGallery($files);
$photos = $files["data"];

unset($files["data"]);

$thumbs = $files["data"];
unset($files["thumbs"]);

$albums = $files;

if(!is_array($photos)) {
	$photos = array();
}

if(!is_array($thumbs)) {
	$thumbs = array();
}

if(!is_array($albums)) {
	$albums = array();
}
?>

<ul class="gallery">
<?php
	if(!is_array($titles))
		$titles = array();

	$titles = array(
		'cuba' => 'Матчевая встреча "Россия - Куба" 6 марта 2016 г. г.Краснодар',
		'pavl' => 'Первенство краснодарского края среди юношей 2002-2003 г.р. 08-14.02.2016 г. ст.Павловская',
		'sparta' => 'Спартакиада финал 17-22.05.2016, Славянск-на-Кубани',
		'chkk' => 'ЧКК и ПКК Славянск-на-Кубани 5-9.04.16г',
		'vodo' => 'Открытый краевой турнир по боксу на призы Чемпиона мира ЗМС Сергея Водопьянова среди юниоров 17-18 лет',
		'krai' => 'Чемпионат и первенство Краснодарского края по боксу среди женщин (18-40 лет ), юниорок (17-18 лет), девушек (15-16 лет) и девочек (13-14 лет)',
		'women' => 'Чемпионат и Первенство КК по боксу среди женщин, юниорок, девушек, девочек (ст. Павловская 18-21.02.2017 г.)',
		'junior1203' => 'Первенство России по боксу среди юниорок 17-18 лет и девушек 15-16 лет.(МО, с.Покровское,12-19.03.17 г.)',
		'sophia' => 'Первенство Европы по боксу среди юниорок (17-18 лет) и девушек (15-16 лет) (cо 2 по 10  июля 2017 год в г. София (Болгария)',
		'spartakiada' => 'Открытие финальных соревнований VIII летней Спартакиады учащихся России по боксу 2017 (25.07.2017)',
		'perv13-14' => 'Первенство Европы по боксу среди юношей (13-14 лет) (17-26.07.2017 г.)',
		'emelyanenko' => 'Рабочая встреча с Кондратьевым В. И. и Емельяненко Ф. В. (08.10.2017 г.)',
		'champ070919' => 'Чемпионат Краснодарского края по боксу среди мужчин 19-40 лет (2000-1979 г.р.)! (07-11.09.2019 г.)',
		'image' => 'Фото',
		'pkk0304' => 'ПКК 2003-2004 г.р. ст. Староминская',
		'pkk0506' => 'ПКК 2005-2006 г.р. г. Курганинск',
		'pkkjun0506' => 'ПКК 2003-2004 г.р., г.  Лабинск',
		'pkk05060710' => 'ПКК 2005-2006 г.р., г. Лабинск',
		'pkk070819' => 'ПКК девушки 2007-2008 г.р. пгт. Ильский',
		'pkk07081901' => 'ПКК юноши 2007-2008 г.р., ст. Старощербиновская',
		'dinamocop19' => 'Команда «Динамо-ЦОП»',
		'voldinamocop19' => 'Волейбольная команда «Динамо-ЦОП»',
		'ckk291019' => 'ЧКК женщины, г. Ейск',
		'lokovoley1019' => 'Локоволей, девушки 2003-2004 г.р., п. Витязево',
		'pr(ufo05-06)' => 'ПР (ЮФО, СКФО), юноши и девушки 2005-2006 г.р.',
		'3tour12-13' => '3-й тур 12-13.11.2019',
		'3tour09-11' => '3-й тур 09-10.11.2019',
		'polufin0304' => 'Полуфинал ПР 2003-2004 г.р., девушки',
		'4tour23301119' => '4-й тур 23-30 ноября 2019 г.',
		'4tour02031219' => '4-й тур 02-03 декабря 2019 г. ',
		'pfpr0304jun' => 'Полуфинал ПР 2003-2004 г.р., юноши',
		'news' => 'новости',
		'19082020' => 'научно-методическое обследование на базе КГУФКСТ',
		
	);
		
	foreach($albums as $album => $data) { 
?>
	<li>
		<div class="icons">
			<?php 
				foreach($data["thumbs"] as $index => $photo) {
					?><img class="icon" src="<?php echo $photo?>"><?php 						
					if ($index > 34) break;
				}
			?>
		</div>
		<div class="link">
			<a href="/gallery?album=<?php echo $albumUrl . $album?>"><div><?php echo $titles[$album];?></div></a>
		</div>
	</li>
<?php }?>
</ul>

<ul class="gallery">
<?php 
	foreach($photos as $photo) { 
?>
	<li><a class="getgallery"><div class="zoom"></div><img src="<?php echo $photo;?>"></a></li>
<?php }?>
</ul>

<?php 
	if(count($photos) > 1) {
?>
<div class="pxs_containerbody">
	<div class="galleryclose"></div>
	<div id="pxs_container" class="pxs_container">
		<div class="pxs_bg">
			<div class="pxs_bg1"></div>
			<div class="pxs_bg2"></div>
			<div class="pxs_bg3"></div>
		</div>
		<div class="pxs_loading">Загрузка...</div>
		<div class="pxs_slider_wrapper">
			<ul class="pxs_slider">
			<?php 
				foreach($photos as $photo) { 
			?>
				<li><img style=" height: 100%;" src="<?php echo $photo;?>"></li>
			<?php }?>
			</ul>
			<div class="pxs_navigation">
				<span class="pxs_next"></span>
				<span class="pxs_prev"></span>
			</div>
			<ul class="pxs_thumbnails">
			<?php 
				foreach($photos as $photo) { 
			?>
				<li><img style="width: 50px;" src="<?php echo $photo;?>"></li>
			<?php }?>
			</ul>
		</div>
	</div>
</div>	
<?php 
	}
	else {
?>
<div class="pxs_containerbody">
	<div class="galleryclose"></div>
	<div id="pxs_container" class="pxs_container">
		<div class="pxs_bg">
			<div class="pxs_bg1"></div>
			<div class="pxs_bg2"></div>
			<div class="pxs_bg3"></div>
		</div>
	</div>
	<div style="position: fixed; width: 80%; height: 80%; top: 10%; left: 10%;">
		<img style="width: 100%; height: 100%;" src="<?php echo $photos[0];?>">
	</div>
</div>
<?php 
	}
?>

<script>
		$(document).ready(
			function(){
				
	
				$(".getgallery").on(
					"click",
					function(){
						$(".pxs_containerbody").show();
						var $pxs_container	= $('#pxs_container');
						$pxs_container.parallaxSlider();
					}
				)
				
				$(".galleryclose").on(
					"click",
					function(){
						$(".pxs_containerbody").hide();
					}
				)
				
				/*$(".events-img").each(
					function(){
						var vibrant = new Vibrant(this, 6, 5);
						var swatches = vibrant.swatches();
						var i = 0;
						
						for (var swatch in swatches) {
					        if (swatches.hasOwnProperty(swatch) && swatches[swatch]) {
						        var clr = swatches[swatch].getHex();
					        	$('.' + $(this).attr("id") + "_" + i).css('background-color', clr);
					        	var clr = swatches[swatch].getTitleTextColor();
					        	$('.' + $(this).attr("id") + "_" + i).css('color', clr);
					        	i++;
					        }
						}
					}
				)*/
	
				
			}
		);
</script>

		



