<html <?php 
	if ($_SESSION["contrast-scheme"]) {
		echo "id=\"contrast-scheme\""; 
	}
?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=Utf-8">
	<?php echo Content::$icons;?>
	
	<link rel="stylesheet" type="text/css" href="/template/css/general.css" />
	<link rel="stylesheet" type="text/css" href="/template/css/contrast.css" />
	<link rel="stylesheet" type="text/css" href="/template/css/jquery.parallaxslider.css" />
	
	<script src="/template/js/jquery-1.11.0.min.js"></script>
	<script src="/template/js/jquery-migrate.min.js"></script>
	<script src="/template/js/vendor.js"></script>
	<script src="/template/js/jquery.adaptiveslider.min.js"></script>
	<script src="/template/js/grayscale.js"></script>
	
	<script src="/template/js/jquery.easing.1.3.js"></script>
	<script src="/template/js/jquery.parallaxslider.js"></script>
	<script src="/template/js/vibrant.min.js"></script>
	
	
	
	
	
	<?php if($_SESSION["font"] > 0) {?>
	<style>
	#contrast-scheme * {
		font-size: <?php echo $_SESSION["font"]?>px !important;
	}
	</style>
	<?php } ?>
	
</head>
<body>
<?php require_once 'blind-trigger.php';?>
<div class="row">
	<?php require_once 'top-menu.php';?>
</div>
<div id="all">
	<div id="view">
		<div id="header" class="row">
			<div class="column w256" id="logo">
				<a href="/" class="no-border"><img src="<?php echo Content::$logo_img;?>"></a>
			</div>
			<div class="column w768">
				<h2 class="site-title"><?php echo Content::$logo_title;?></h2>
			</div>
			<div class="column w256" id="partners">
				<?php foreach (Content::$partners as $partner) {?>
					<a href="<?php echo $partner["link"];?>" class="no-border"><img src="<?php echo $partner["img"];?>"></a>
				<?php } ?>
			</div>
		</div>
		<div id="media" class="row">
			<div class="column w256">
			<?php require_once 'left-menu.php';?>
			</div>
			<?php if ("news" == Controller::$bodyUrl) { ?>
				<div class="column w768">
					<?php require_once 'news.php';?>	
				
			<?php } elseif  ("" == Controller::$bodyUrl) { ?>
				<div class="column w768">
					<?php require_once 'news-slider.php';?>	

			<?php } elseif  ("gallery" == Controller::$bodyUrl) { ?>
				<div class="column w768">
					<?php require_once 'gallery.php';?>		
				
			<?php } else {?>
				<div class="column w768">
					<?php require_once 'content.php';?>	
				
			<?php } ?>
				<div style="float: none; clear: both"></div>
				<div>
					<center><h2>Телефоны горячей линии</h2></center>
					<h3>В соответствии с распоряжением главы администрации (губернатора) Краснодарского края от 8 июля 2004 года № 805-р «О мерах направленных на погашение предприятиями края задолженности по заработной плате», а также с целью оперативного и своевременного выявления случаев невыплаты заработной платы работникам предприятий, осуществляющих деятельность на территории Краснодарского края, в соответствующих органах власти работают телефоны «горячая линия»</h3>
					<center><table border=0 cellpadding=10>
						<tr>
							<td><center><h2>8 (861) – 991–09–55</h2><h3>Государственная инспекция труда в Краснодарском крае</h3></center></td>
							<td><center><h2>8 (861) – 210–70–50</h2><h3>Министерство экономики Краснодарского края</h3></center></td>
							<td><center><h2>8 (861) – 252–33–15</h2><h3>Министерство труда и социального развития Краснодарского края</h3></center></td>
						</tr>
					</table></center>
				</div>
			</div>
			<div class="column w256">
				<?php //require_once 'event-banners.php';?>
				<?php require_once 'link-banners.php';?>
				<br><br><br>
				<div class="title-line">
					<div class="title">КОНТАКТЫ</div>
				</div>
<br>
				<div id="event-banner" class="banner w220 h84">
					<style>
					.insta {
						
					}
					
					a.insta {
						text-decoration: none;
					    display: block;
						width: 42px;
						height: 42px;
						text-indent: -9999px;
						overflow: hidden;
						transition: 0.2s;
						border-bottom: 0px;
						background: url(data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkVCNTdFQUQ1QjNDOTExRTk5NDY2QzY3OEQ2MDM1OEM3IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkVCNTdFQUQ0QjNDOTExRTk5NDY2QzY3OEQ2MDM1OEM3IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5kaWQ6QjY4RTMxNjBDNUIzRTkxMTlDRThCMjdDRURCNDA0OTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QjY4RTMxNjBDNUIzRTkxMTlDRThCMjdDRURCNDA0OTEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAqACoDAREAAhEBAxEB/8QApwAAAwADAQAAAAAAAAAAAAAABQYHAQMEAgEAAgMBAQEAAAAAAAAAAAAABAUCAwYBBwAQAAEDAgQCBAgKCwAAAAAAAAIBAwQABRExEgYhB1EiMhNBYXGCMxQ0F4GhscFSskNTsxVCYpLS4iOTRJQ1NhEAAQMCAwQDDgcAAAAAAAAAAQACAxEEMRIFIUFRMoGhE2FxkbHh8SJCgqIjMxQV8NFiwkMkBv/aAAwDAQACEQMRAD8AOczuZFxvE6Va2XUC0suKgiPDXp4Yl01qdO05jWh7hVx6lQ+N7zQYITZuWO/bxFCVEt6tRnExbckGjOpF8KCuJYfBRcuowRmhO3uK2OBrcSiXuR5jL9lG/wAhf3aq+8W/d8COjfGMVolcm+Y8ZtXUhg+gpiosviRcOhC0V8NVtzv6kfFcQ8UM27ujcW2r2273jwORj0SYjqknD9IDFa5cwRStwHfCZOsGSt3bcCr/AO8S1fQX/XfmOaf0/LWa+md72VZ76F/v5elQ3ltY2b1v6EzNBHGAJyU6BZErXEUXzlRae3d7liIbjgmd1a9lCXLO8N0bk3BuGSKSXxji+TEGCwRCIiJaRRBHMlwoOGaONoFBVMrXTGsYCRuqSjETlFzAejg67KbjOuJiEV6SaOr4lwxRFrh1FvBUG+tWmlCRxA2LzabY9Ym7qd7vM2zbhgIh22MJkoO9XFC8IuCRdXCovu89BlBbvREjRLk7NjXxu5jw/JdHM0WrnZtubqVoWplzZVqbpTBCMExRfgwWpWbiC5m4KOmDs5JIdzTsSb6/M+9L2fuc/s/o0VlHWmXZt4etVPHKCMDe+WyROPq7/wAo1k2XhkfQqrXog20J/U1b+WcKM5vmS64CE7HGQ7GFeOLmpUx8qJQ9vcF7yCV3W6ttG0wdlB7yU7tcrrOucibNfd9cV0tS6iFW1ElTSKIvV05VFtySU2htY44w1oGWnh86bN5uPXPl1t663HrXRHCaF4kwNxrimpfKiItMYpdgKRWMYjvJY2clK94rn3gOPK3aHiNz6p0wtpPTJULQf3ZvxwSFp/Dpn2iZ08apPLJtI28I7h8O8B1ofKSIqfVrzuxm+OK76qvXzmtCBuIK5Si3Gxbidkx/5UyM+ZDinBUJVXBekSRaEdM6KU7iCrhJHc24a7a1zQjE2/bEmPfmF1sDi3Bes8LKp3bhdK9YfjSjxfQuOZzfSQEVlesGSOUZN1cQlLeO6pe4JLZG0MaFFHRDhN5AmXgzJavbd5zwCa2GmNtmnbmc7mdxRjfzRw9kbTtb6aJQAbxtrmgqK5/t05hfSiT6dR9zM8cuCQsPw6YdomtPGqw7tyTargrSakJkkVp1M+HZKvOb+N0EnWCk0F+2aIVxpQhMbl0iymxW7WwJTwph3w9UlROnL5asGrxv+bGHHilzbdzD8J5aOCGTJ2zG8e8sBF5/8VXsvbU/x9flRkUN2cJeryII/u7Z9udR6BtgPWg4tm8aKKF4F466MivIhysR7dMupRR8/o9weZJ10n3ndN9R6Svey5BI202CYAA48BFOimMEpcalMGQRWkNBsa3aVQPcwn36+yeL2jo8lMM5WV+/Hh69fZ4KiXjMPQ5L6Tt+b4umgL3k9T2sEihx39CWn8i7PzVgZuc8vRgnMXSlu65L2KviTm26UmXXtL2KZQp9b4b0d5Tf9OnoMl9p7eX9v+t81aOzw3LMf6PAfM/Z51caOWQX/9k=) 50% 50% no-repeat;
					}
					</style>
					<a class="insta" href="https://www.instagram.com/23volley/" target="_blank">Instagram</a> 
					
					<p>Железнодорожная ул., 49, микрорайон Центральный, Краснодар</p>
					<p>+7 861 239-72-42, +7 861 239-70-91</p>
					<p>e-mail: volleyballschool@rambler.ru</p>
					
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="footer" class="row">
		<div class="column-h w1280">
			<?php echo Content::$footer;?>			
		</div>
		<div class="clear"></div>
	</div>
</div>
<script>
	$(document).ready(function(){$(".adaptive-slider").adaptiveSlider({opacity:0.5, normalizeTextColor:!0}); 
	$(".adaptive-slider").show()});

	<?php if ($_SESSION["contrast-scheme"]) {?>
	$(document).ready(function() {

		// Grayscale images on Safari and Opera browsers
		if(getBrowser()=='opera' || getBrowser()=='safari'){
			var $images = $("img")
			, imageCount = $images.length
			, counter = 0;

			// One instead of on, because it need only fire once per image
			$images.one("load",function(){
				// increment counter every time an image finishes loading
				counter++;
				if (counter == imageCount) {
					// do stuff when all have loaded
					grayscale($('img'));
					$("img").hover(
						function () {
							grayscale.reset($(this));
						}, 
						function () {
							grayscale($(this));
						}
					);
				}
			}).each(function () {
			if (this.complete) {
				// manually trigger load event in
				// event of a cache pull
					$(this).trigger("load");
				}
			});
		};
		
		
		// Grayscale images only on browsers IE10+ since they removed support for CSS grayscale filter
		if (getInternetExplorerVersion() >= 10){
			$('img').each(function(){
				var el = $(this);
				el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"5","opacity":"0"}).insertBefore(el).queue(function(){
					var el = $(this);
					el.parent().css({"width":this.width,"height":this.height});
					el.dequeue();
				});
				this.src = grayscaleIE10(this.src);
			});
			
			// Quick animation on IE10+ 
			
			
			function grayscaleIE10(src){
				var canvas = document.createElement('canvas');
				var ctx = canvas.getContext('2d');
				var imgObj = new Image();
				imgObj.src = src;
				canvas.width = imgObj.width;
				canvas.height = imgObj.height; 
				ctx.drawImage(imgObj, 0, 0); 
				var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
				for(var y = 0; y < imgPixels.height; y++){
					for(var x = 0; x < imgPixels.width; x++){
						var i = (y * 4) * imgPixels.width + x * 4;
						var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
						imgPixels.data[i] = avg; 
						imgPixels.data[i + 1] = avg; 
						imgPixels.data[i + 2] = avg;
					}
				}
				ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
				return canvas.toDataURL();
			};
		};
		
		// This block simply ads a corresponding class to the body tag so that we can target browsers with CSS classes
		if(getBrowser()=='mozilla'){
			// Mozilla
			$('body').addClass('mozilla');
		}
		else if(getBrowser()=='ie'){
			// IE Favourite
			$('body').addClass('ie');
		}
		else if(getBrowser()=='opera'){
			// Opera
			$('body').addClass('opera');
		}           
		else if (getBrowser()=='safari'){ // safari
			// Safari
			$('body').addClass('safari');
		}
		else if(getBrowser()=='chrome'){
			// Chrome
			$('body').addClass('chrome');
		};
		if (getInternetExplorerVersion() >= 10){
			$('body').addClass('ie11');
		};

		// Detection function to tell what kind of browser is used
		function getBrowser(){
			var userAgent = navigator.userAgent.toLowerCase();
			return "ie";
		};
		
		// Since IE11 can not be detected like this because the new user agent on IE11 is trying to hide as Mozilla
		// we detect IE11 with this function
		function getInternetExplorerVersion(){
			var rv = -1;
			if (navigator.appName == 'Microsoft Internet Explorer'){
				var ua = navigator.userAgent;
				var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
				if (re.exec(ua) != null)
				rv = parseFloat( RegExp.$1 );
			}
			else if (navigator.appName == 'Netscape'){
				var ua = navigator.userAgent;
				var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
				if (re.exec(ua) != null)
				rv = parseFloat( RegExp.$1 );
			}
			return rv;
		};
	});
	<?php } ?>
</script>
</body>
</html>