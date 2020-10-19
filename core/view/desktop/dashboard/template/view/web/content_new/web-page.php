<?

if(isset($_GET["toexcel"])) {
		$file = "elreg_stat.xls";
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		//header('Content-Length: ' . filesize($file));
		
		require_once 'tournament.php';
	}
	else {
?>
<!DOCTYPE html>
<html lang="ru-ru" <?php 
	if ($_SESSION["contrast-scheme"]) {
		echo "id=\"contrast-scheme\""; 
	}
?>>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="referrer" content="origin" />
<meta name="format-detection" content="telephone=no">
<meta http-equiv="x-rim-auto-match" content="none">
<meta property="og:type" content="website" />
<meta property="og:locale" content="ru_RU" />
<meta property="og:locale:alternate" content="ru_RU" />



<meta name="author" content="<?php echo Content::$logo_title_short_no_quotes;?> <?php echo Content::$site_url;?>">
<meta name="copyright" content="<?php echo Content::$logo_title_short_no_quotes;?>">
<meta property="og:site_name" content="<?php echo Content::$logo_title_no_quotes;?>" />
<meta property="og:url" content="<?php echo Content::$site_url;?>" />
<meta property="og:image" content="<?php echo Content::$site_url;?>/templates/ver2020/img/favicon/android-icon-192x192.png" />
<link rel="image_src" href="<?php echo Content::$site_url;?>/templates/ver2020/img/favicon/android-icon-192x192.png" />
<meta name="description" content="<?php echo Content::$description;?>" />
<meta property="og:description" content="<?php echo Content::$description;?>" />
<title><?php echo Content::$logo_title;?></title>
<meta property="og:title" content="<?php echo Content::$logo_title_no_quotes;?>" />



<link rel="apple-touch-icon" sizes="57x57" href="/templates/ver2020/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/templates/ver2020/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/templates/ver2020/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/templates/ver2020/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/templates/ver2020/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/templates/ver2020/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/templates/ver2020/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/templates/ver2020/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/templates/ver2020/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/templates/ver2020/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/templates/ver2020/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/templates/ver2020/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/templates/ver2020/img/favicon/favicon-16x16.png">
<meta name="msapplication-TileImage" content="/templates/ver2020/img/favicon/ms-icon-144x144.png">
<link href="/templates/ver2020/img/favicon/favicon.ico" rel="shortcut icon">
<style>
/*! normalize.css v8.0.0 | MIT License | github.com/necolas/normalize.css */
button,hr,input{overflow:visible}progress,sub,sup{vertical-align:baseline}[type=checkbox],[type=radio],legend{box-sizing:border-box;padding:0}html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}h1{font-size:2em;margin:.67em 0}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}img{border-style:none}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{padding:.35em .75em .625em}legend{color:inherit;display:table;max-width:100%;white-space:normal}textarea{overflow:auto}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details{display:block}summary{display:list-item}[hidden],template{display:none}

@font-face {
    font-family: 'RobotoL';
    font-style: normal;
    font-weight: 400;
    src: url(/templates/ver2020/fonts/RobotoLight.woff) format('woff');
}

@font-face {
    font-family: 'RobotoCnB';
    font-style: normal;
    font-weight: 400;
    src: url(/templates/ver2020/fonts/RobotoCondensedRegular.woff) format('woff');
}

:focus::-webkit-input-placeholder { color: transparent }
:focus::-moz-placeholder { color: transparent }
:focus:-moz-placeholder { color: transparent }
:focus:-ms-input-placeholder { color: transparent }

a{ color: #005bff; }

/* daddy bear */
::-moz-selection {
    background-color: #2B3E47;
    color: #eee;
}
::selection {
    background-color: #2B3E47;
    color: #eee;
}

.RL{
    font-family: 'RobotoL', Helvetica, sans-serif;
    color: #333;
}
.RCB{
    font-family: 'RobotoCnB', Helvetica, sans-serif;
    letter-spacing: 0.07em;
    color: #333;
    text-align: left;
    text-transform: uppercase;
}

.w1200{
    max-width: 73em;
    margin: auto;
    padding: 1em;
}
.w50{
    width: 50%;
}
.w100{
    width:100%;
}

.pre-h,.top-nav,.footer,.bttn1 {
    background-color: #2B3E47;
    color:#F1F1F1;
}

.wh-a{
    color:#fff;
}

.header,.pre-f{
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
}

.pre-h-fl,.pre-h-addr,.header-fl,.top-nav-fl,.main-wr,.n-wr,.pht-wr,.w30-wr{
    display: flex;
    justify-content: space-between;
}

.header-fl,.top-nav-fl {
    align-items: center;
}

.header-fl {
    padding: 2em 1em;
}

.mail-link {
    color: #fff;
    text-decoration: none;
}

.pre-h-addr-soc {
    display: block;
    width: 1.5em;
    height: 1.5em;
    margin-left: .7em;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 1.2em;
    transition:all ease-out .15s;
}

.logo {
    display:block;
    width: 50%;
    padding: 1em 0 1em 5em;
    line-height: 1.5em;
    background-repeat: no-repeat;
    background-position: left center;
    background-size: 4em;
    text-decoration:none;
    transition:all ease-out .15s;
}

.ph-wr {
    line-height: 1.5em;
    text-align: right;
}

.ph-it {
    font-size: 1.2em;
    text-decoration: none;
}

.top-nav-fl{
    padding:1em 0;    
}

.top-nav-ul {
    display: flex;
    padding: 0;
    margin: 0;
    list-style: none;
}
.top-nav-a {
    display: block;
    padding: .3em 0;
    margin-right:1em;
    color: #f1f1f1;
    text-decoration: none;
    transition:all ease-out .15s;
}
.top-nav-li-cnr .top-nav-a{
    background-repeat: no-repeat;
    background-position: right center;
    background-size: .6em;
    padding-right:1em;
}
.top-nav-sub-ul {
    position: absolute;
    z-index: 100;
    min-width: 10em;
    background: #fff;
    padding: 1.5em;
    margin: 0;
    box-shadow: 0 .2em .3em rgba(0,0,0,.3);
    border-radius: 0 0 .3em .3em;
    transition:all ease-out .3s;
    
    visibility:hidden;
    opacity:0;
    transform:translateY(3em);
}
.top-nav-sub-ul:after {
    content: '';
    position: absolute;
    top: -1em;
    left: 2.5em;
    border: .5em solid transparent;
    border-bottom: .5em solid #fff;
}
.top-nav-sub-a {
    display: block;
    padding: .5em;
}
.top-srch {
    display: flex;
}
.top-srch-inp {
    border: none;
    background: #F1F1F1;
    padding: .5em .7em;
    border-radius: .3em 0 0 .3em;
    width: 11.5em;
}
.top-srch-bttn {
    height: 2.15em;
    width: 3em;
    background-color: #DDD;
    border-radius: 0 .3em .3em 0;
    cursor:pointer;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 1.2em;
    transition:all ease-out .15s;
}

.main {
    width: 75%;
}
.aside {
    width: 22%;
    margin: 0 0 0 3%;
}

/* Slider */
.slick-slider
{
    position: relative;

    display: block;
    box-sizing: border-box;

    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;

    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;

    display: block;
    overflow: hidden;

    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;

    display: block;
    margin-left: auto;
    margin-right: auto;
}
.slick-track:before,
.slick-track:after
{
    display: table;

    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;

    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;

    height: auto;

    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}

.sl {
    color:#f1f1f1;
}

.sl-fl {
    height: 14.5em;
    overflow: hidden;
}

.sl-sl-wr {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
}

.sl-sl {
    padding: 2em 2em 7em;
    background: rgba(43, 61, 71, .5);
    background: -moz-linear-gradient(left, rgb(43, 61, 71), rgba(0,0,0,.4));
    background: -o-linear-gradient(left, rgb(43, 61, 71), rgba(0,0,0,.4));
    background: gradient(linear, left, rgb(43, 61, 71), rgba(0,0,0,.4));
    background: -webkit-linear-gradient(left, rgb(43, 61, 71) 0%,rgba(0,0,0,.4) 100%);
    background: linear-gradient(to right, rgb(43, 61, 71), rgba(0,0,0,.4));
}
    
.sl-date {
    font-size: .9em;
}
.sl-ttl {
    color: #fff;
    font-size: 1.2em;
    margin: .5em auto 1em;
}
.sl-mr-l{
    color: #fff;
}

.sl-cntrls {
    position: relative;
    z-index: 100;
    display: flex;
    align-items: center;
    margin-top: -3em;
    padding-left: 2em;
}
.sl-cntrls-l, .sl-cntrls-r {
    width: 1.5em;
    height: 1.5em;
    margin: 0 0 0 .5em;
    cursor:pointer;
    background-repeat: no-repeat;
    background-position: center;
    background-size: .8em;
}
.sl-cntrls-l{
    transform: rotate(180deg);
    margin: 0 .5em 0 0;
}

.slick-dots{
    display: flex;
    padding: 0;
    margin: 0;
    list-style: none;
}

.slick-dots li{
    width: .7em;
    height: .7em;
    background: #f1f1f1;
    border-radius: 50%;
    margin: 0 .5em;
    cursor: pointer;
    transition:all ease-out .15s;
}

.slick-dots li.slick-active{
    transform: scale(1.7);
    cursor:auto;
}

.slick-dots button{
    display:none;
}

.h2 {
    margin: 2.5em auto 1.5em;
}

.n-wr {
    flex-wrap: wrap;
}
.n-it{
    width: 49%;
    margin-bottom:3em;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
}
.n-date {
    font-size: .9em;
}
.n-ttl {
    width:100%;
    font-weight: normal;
    font-size: 1.2em;
    margin: .5em auto 1em;
}
.n-img-wr { width: 40%; }
.n-img {
    width: 100%;
}
.n-desk {
    width: 60%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.n-desk-p {
    margin: 0 0 .5em 1em;
}
.n-a {
    margin-left: 1em;
}

.bttn1 {
    text-decoration: none;
    padding: .7em 1.5em;
    width: 8em;
    text-align: center;
    display: block;
    line-height: 1em;
    margin: 1em 0;
    transition:all ease-out .1s;
}

.pht-it {
    width: 32%;
}
.pht-ttl {
    font-weight: normal;
    line-height: 1.2em;
}
.pht-img {
    width: 100%;
}

.pre-f .h2{
    margin-top:1.5em;
}
.pw100 {
    font-size: 1.2em;
    line-height: 1.5em;
}

.w30-it {
    width: 32%;
}
.w30-ttl {
    font-size: 1.3em;
}
.w30-desk {
    line-height: 1.5em;
    margin-top: .5em;
}

.as-flg {
    display: block;
    margin: 0 auto 2em;
    height: 6.5em;
}
.clndr-wr{
    background:#eee;
    padding:1em;
    margin-bottom:1em;
}
.clndr-ttl {
    margin: 0 auto 1.5em;
    font-size: 1.5em;
    text-align: center;
}
.clndr-ds {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.clndr-ds-it {
    width: 14%;
    text-align: center;
    margin: .3em 0;
}
.clndr-ds-it-dact {
    opacity: .5;
}
.clndr-mnth {
    text-align: center;
    margin: .5em auto;
}
.clndr-a {
    margin: 1em auto .5em;
    display: block;
}
.aside .bttn1{
    margin: 1em auto;
}
.clndr-desk {
    line-height: 1.5em;
}










.h1 {
    font-size: 1.6em;
    line-height: 1.5em;
}

.n-sngl-date{
    
    display:block;
    margin-bottom:1em;
    
}

.n-sngl-img {

    display: block;
    max-width: 40em;

}

.n-sngl-p {

    max-width: 40em;
    line-height: 1.5em;
    font-size: 1.1em;

}


.gall_cont {
    display: flex;
    width: 100%;
    justify-content: flex-start;
}
.gall-a {
    margin: 0 .25em 1em;
    width: 13.5em;
}
.gall-a:first-child {
    margin-left: 0;
}
.gall-img {
    max-width: 100%;
    height: auto;
    border-radius: .3em;
    transition: all linear .1s;
}

/* blueimp-gallery */
.blueimp-gallery,.blueimp-gallery>.slides>.slide>.slide-content{position:absolute;top:0;right:0;bottom:0;left:0;-moz-backface-visibility:hidden}
.blueimp-gallery>.slides>.slide>.slide-content{margin:auto;width:auto;height:auto;max-width:100%;max-height:100%;opacity:1}
.blueimp-gallery{position:fixed;z-index:1000;overflow:hidden;background:#000;background:rgba(0,0,0,.9);opacity:0;display:none;direction:ltr;-ms-touch-action:none;touch-action:none}
.blueimp-gallery-carousel{position:relative;z-index:auto;margin:1em auto;padding-bottom:56.25%;box-shadow:0 0 .625em #000;-ms-touch-action:pan-y;touch-action:pan-y}
.blueimp-gallery-display{display:block;opacity:1}
.blueimp-gallery>.slides{position:relative;height:100%;overflow:hidden}
.blueimp-gallery-carousel>.slides{position:absolute}
.blueimp-gallery>.slides>.slide{position:relative;float:left;height:100%;text-align:center;-webkit-transition-timing-function:cubic-bezier(.645,.045,.355,1);-moz-transition-timing-function:cubic-bezier(.645,.045,.355,1);-ms-transition-timing-function:cubic-bezier(.645,.045,.355,1);-o-transition-timing-function:cubic-bezier(.645,.045,.355,1);transition-timing-function:cubic-bezier(.645,.045,.355,1)}
.blueimp-gallery,.blueimp-gallery>.slides>.slide>.slide-content{transition:opacity .2s linear}
.blueimp-gallery>.slides>.slide-loading{background: url(/templates/ver2020/img/loading.gif) center no-repeat;background-size: 4em;}
.blueimp-gallery>.slides>.slide-loading>.slide-content{opacity:0}
.blueimp-gallery>.slides>.slide-error>.slide-content{display:none}

.blueimp-gallery>.next,.blueimp-gallery>.prev{position:absolute;top:50%;left:1em;padding: 2em;margin-top:-2em;text-decoration:none;background-color:rgba(0,0,0,.5);-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;border-radius:.3em;opacity:.5;cursor:pointer;display:none;background-repeat: no-repeat;background-size: 1.5em;background-position: center;}
.blueimp-gallery>.next{left:auto;right:1em}

.blueimp-gallery>.close{position:absolute;top:1em;right:1em;padding:2em;margin:0;opacity:.8;display:none;background-color:rgba(0,0,0,.5);border-radius:.3em;cursor:pointer;background-repeat: no-repeat;background-size: 1.5em;background-position: center;}

.blueimp-gallery-controls>.close,.blueimp-gallery-controls>.next,.blueimp-gallery-controls>.prev{display:block;transform:translateZ(0)}
.blueimp-gallery-left>.prev,.blueimp-gallery-right>.next,.blueimp-gallery-single>.next,.blueimp-gallery-single>.play-pause,.blueimp-gallery-single>.prev{display:none}
.blueimp-gallery>.close,.blueimp-gallery>.next,.blueimp-gallery>.play-pause,.blueimp-gallery>.prev,.blueimp-gallery>.slides>.slide>.slide-content{-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
.blueimp-gallery>.slides>.slide{min-height:18.75em}
.blueimp-gallery>.indicator{position:absolute;top:auto;right:1em;bottom:1em;left:1em;margin:0 2.5em;padding:0;list-style:none;text-align:center;line-height:1em;display:none}
.blueimp-gallery>.indicator>li{display:inline-block;width:1.5em;height:1.5em;margin:0 .3em;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;background:rgba(255,255,255,.25) center no-repeat;border-radius:.3em;opacity:.5;cursor:pointer}
.blueimp-gallery>.indicator>li:after{opacity:0;position:absolute;border-radius:.3em;content:'';top:-7.5em;width:7em;height:7em;margin-left:-3.5em;transition:opacity ease-out .1s;pointer-events:none}
.blueimp-gallery>.indicator>.active:after{display:none}
.blueimp-gallery-controls>.indicator{display:block;transform:translateZ(0)}
.blueimp-gallery-single>.indicator{display:none}
.blueimp-gallery>.indicator{-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
.blueimp-gallery>.slides>.slide>.video-content>img{position:absolute;top:0;right:0;bottom:0;left:0;margin:auto;width:auto;height:auto;max-width:100%;max-height:100%;-moz-backface-visibility:hidden}
.blueimp-gallery>.slides>.slide>.video-content>video{position:absolute;top:0;left:0;width:100%;height:100%}
.blueimp-gallery>.slides>.slide>.video-content>iframe{position:absolute;top:100%;left:0;width:100%;height:100%;border:none}
.blueimp-gallery>.slides>.slide>.video-playing>iframe{top:0}
.blueimp-gallery>.slides>.slide>.video-content>a{position:absolute;top:50%;right:0;left:50%;margin:-4em -4em 0 0;width:8em;height:8em;opacity:.8;cursor:pointer}
.blueimp-gallery>.slides>.slide>.video-playing>a,.blueimp-gallery>.slides>.slide>.video-playing>img{display:none}
.blueimp-gallery>.slides>.slide>.video-content>video{display:none}
.blueimp-gallery>.slides>.slide>.video-playing>video{display:block}
.blueimp-gallery>.slides>.slide>.video-content{height:100%}

.blueimp-gallery>.close:hover,.blueimp-gallery>.next:hover,.blueimp-gallery>.prev:hover{color:#fff;opacity:1}
.blueimp-gallery>.indicator>.active,.blueimp-gallery>.indicator>li:hover{background-color:#fff;opacity:1}
.blueimp-gallery>.indicator>li:hover:after{opacity:1;background:inherit;transition:opacity ease-out .15s;}
.blueimp-gallery>.slides>.slide>.video-content>a:hover{opacity:1}






/* images */
.header,.pre-f{
    /*background-image: url(/templates/ver2020/img/bg-1920.jpg);*/
}
.soc-smap{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBhdGggZmlsbD0iI0YxRjFGMSIgZD0iTTM4NDkgMjgzMjNsLTM4NDcgMCAwIDExNjczIDExNTQ0IDAgMCAtMTE2NzMgLTM4NDcgMCAwIC01OTU4IDExNTQ0IDAgMCA1OTU4IC0zODQ3IDAgMCAxMTY3MyAxMTU0NCAwIDAgLTExNjczIC0zODUwIDAgMCAtNTk1OCAxMTU0NiAwIDAgNTk1OCAtMzg1MCAwIDAgMTE2NzMgMTE1NDYgMCAwIC0xMTY3MyAtMzg1MCAwIC0xMSAtOTgwNSAtMTUzODMgMCAwIC00NTA4IDM2NDkgMCAwIC0xMTY3M2MtMzk4MSwwIC03NTU5LDAgLTExNTQ2LDBsMCAxMTY3MyA0MDUwIDAgMCA0NTA4IC0xNTM5NCAwIDAgOTgwNXoiPjwvcGF0aD4KPC9zdmc+");
}
.soc-inst{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBhdGggZmlsbD0iI0YxRjFGMSIgZD0iTTI5NzI0IDBsLTE3MTExIDBjLTY5NTQsMCAtMTI2MTIsNTY1OCAtMTI2MTIsMTI2MTFsMCAxNzExMWMwLDY5NTQgNTY1OCwxMjYxMSAxMjYxMiwxMjYxMWwxNzExMSAwYzY5NTQsMCAxMjYxMiwtNTY1OCAxMjYxMiwtMTI2MTFsMCAtMTcxMTFjMCwtNjk1NCAtNTY1OCwtMTI2MTEgLTEyNjEyLC0xMjYxMXptNTAzOSAxMDMwMGMwLC0xNDQ5IC0xMTc1LC0yNjI0IC0yNjI0LC0yNjI0IC0xNDQ5LDAgLTI2MjQsMTE3NSAtMjYyNCwyNjI0IDAsMTQ0OSAxMTc1LDI2MjQgMjYyNCwyNjI0IDE0NDksMCAyNjI0LC0xMTc1IDI2MjQsLTI2MjR6bS0xMzU5NCAtODJjLTYwMzcsMCAtMTA5NDksNDkxMiAtMTA5NDksMTA5NDkgMCw2MDM3IDQ5MTIsMTA5NDkgMTA5NDksMTA5NDkgNjAzNywwIDEwOTQ5LC00OTEyIDEwOTQ5LC0xMDk0OSAwLC02MDM3IC00OTEyLC0xMDk0OSAtMTA5NDksLTEwOTQ5em0wIDE3NjM5Yy0zNjk1LDAgLTY2OTAsLTI5OTUgLTY2OTAsLTY2OTAgMCwtMzY5NSAyOTk1LC02NjkwIDY2OTAsLTY2OTAgMzY5NSwwIDY2OTAsMjk5NSA2NjkwLDY2OTAgMCwzNjk1IC0yOTk1LDY2OTAgLTY2OTAsNjY5MHptMTY5MDggMTg2NWMwLDQ2MTMgLTM3NDAsODM1MyAtODM1Myw4MzUzbC0xNzExMSAwYy00NjEzLDAgLTgzNTMsLTM3NDAgLTgzNTMsLTgzNTNsMCAtMTcxMTFjMCwtNDYxMyAzNzQwLC04MzUzIDgzNTMsLTgzNTNsMTcxMTEgMGM0NjEzLDAgODM1MywzNzQwIDgzNTMsODM1M2wwIDE3MTExIDAgMHoiPjwvcGF0aD4KPC9zdmc+");
}
.soc-vk{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBhdGggZmlsbD0iI0YxRjFGMSIgZD0iTTg0NjYgNDIzMzVsMjU0MDMgMGM0NjU4LDAgODQ2NSwtMzgwOCA4NDY1LC04NDY1bDAgLTI1NDA1YzAsLTQ2NTggLTM4MDgsLTg0NjUgLTg0NjUsLTg0NjVsLTI1NDAzIDBjLTQ2NTgsMCAtODQ2NSwzODA4IC04NDY1LDg0NjVsMCAyNTQwNWMwLDQ2NTggMzgwOCw4NDY1IDg0NjUsODQ2NXptMjUwMyAtMjk0NTFjMTAxNSwyNTA1IDIzMDAsNDg2OCAzOTkzLDY5ODggMjI1LDI4MyA1MDgsNTMzIDgwOCw3MzggNDM1LDMwMCA4NDUsMTkzIDEwMjMsLTMwNSAxODgsLTUyMyAzNjAsLTE1ODMgMzcwLC0yMTMzIDI4LC0xNDM1IC01LC0yMzc1IC04MywtMzgwOCAtNTAsLTkxOCAtMzc1LC0xNzI1IC0xNzI1LC0xOTY4IC00MTgsLTc1IC00NTUsLTQxOCAtMTg4LC03NjAgNTU4LC03MTUgMTMzNSwtODI4IDIxNzgsLTg3MyAxMzY1LC03MyAyNzM1LC0xMyA0MTAzLDAgNTU4LDUgMTExOCw1MCAxNjY1LDE3MCA3MTUsMTU1IDEwOTgsNjU4IDEyMTgsMTM1NSA2MCwzNjAgOTMsNzMzIDgzLDEwOTUgLTM1LDE1NjggLTExMCwzMTMzIC0xMjgsNDY5OCAtOCw2MTUgMzgsMTI0NSAxNjgsMTg0MyAxODUsODM1IDc1MywxMDQ1IDEzMzMsNDQzIDczOCwtNzY4IDEzODgsLTE2MjggMTk5OCwtMjUwMyAxMTEwLC0xNTkwIDE5MzgsLTMzMzggMjY1MCwtNTEzOCAzNjgsLTkyOCA2NTAsLTExMzAgMTY1MCwtMTEzMyAxODc4LC01IDM3NTgsLTUgNTYzNSwwIDMzMywzIDY4MywzMyA5OTUsMTMzIDUxMCwxNjMgNzEzLDU4MCA1OTUsMTEwOCAtMjgwLDEyMzggLTk0OCwyMjkwIC0xNjY1LDMzMDAgLTExNTAsMTYyMyAtMjM1MywzMjA1IC0zNTMwLDQ4MTAgLTE1MCwyMDUgLTI4Myw0MjMgLTQwNSw2NDMgLTQ0MCw3OTUgLTQxMCwxMjQzIDIzMywxOTAzIDEwMjAsMTA1NSAyMTE1LDIwNDAgMzEwMywzMTIzIDcyMCw3ODggMTM4NSwxNjQzIDE5NTUsMjU0MCA3MjAsMTEzOCAyNzUsMjIxMCAtMTA3MCwyNDAwIC04NDgsMTIwIC00OTgzLDAgLTUxOTgsMCAtMTExMywtNSAtMjA4OCwtMzkwIC0yODczLC0xMTQ1IC04NzMsLTg0MyAtMTY2NSwtMTc2MyAtMjUwMywtMjY0MCAtMjUzLC0yNjUgLTUyMywtNTE4IC04MTMsLTc0MCAtNjg4LC01MjMgLTEzNjAsLTQwOCAtMTY4MCwzOTggLTI3NSw2OTMgLTUxMCwyNTEwIC01MjMsMjY2NSAtNTgsODEwIC01NzMsMTMyOCAtMTQ4MywxMzc4IC0yNjIzLDE0MyAtNTE2NSwtMTUwIC03NTMzLC0xNDIwIC0yMDA4LC0xMDc1IC0zNjEwLC0yNTkzIC00OTk4LC00MzY1IC0yMjA1LC0yODE1IC0zOTQ4LC01OTEwIC01NTM4LC05MDk1IC04MywtMTYzIC0xNjkzLC0zNTkwIC0xNzM1LC0zNzUzIC0xNDUsLTU0MyAtMTAsLTEwNjAgNDQ4LC0xMjM4IDI4NSwtMTEzIDU1OTUsMCA1Njg1LDUgODQ4LDQ1IDE0MjUsNDAzIDE3ODMsMTI4M3oiPjwvcGF0aD4KPC9zdmc+");
}
.soc-yt{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBhdGggZmlsbD0iI0YxRjFGMSIgZD0iTTMzNTQxIDBsLTI0NzQ3IDBjLTQ4NTcsMCAtODc5MiwzOTM1IC04NzkyLDg3OTJsMCAyNDc0OWMwLDQ4NTcgMzkzNSw4NzkyIDg3OTIsODc5MmwyNDc0NyAwYzQ4NTcsMCA4NzkyLC0zOTM1IDg3OTIsLTg3OTJsMCAtMjQ3NDljMCwtNDg1NyAtMzkzNSwtODc5MiAtODc5MiwtODc5MnptLTIxNDk0IDEyNDcybDAgMTc0MDljMCw1MjIgNTQ1LDg2NyAxMDE3LDY0MmwxNzY5OSAtODQ0MmM1MzMsLTI1NSA1NDMsLTEwMDggMTgsLTEyNzhsLTE3NzAyIC04OTY3Yy00NzMsLTI0MCAtMTAzMiwxMDMgLTEwMzIsNjM1eiI+PC9wYXRoPgo8L3N2Zz4=");
}
.soc-fb{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBhdGggZmlsbD0iI0YxRjFGMSIgZD0iTTM2NjMwIDBsLTMwOTI1IDBjLTMxNTEsMCAtNTcwNSwyNTU0IC01NzA1LDU3MDVsMCAzMDkyNGMwLDMxNTEgMjU1NCw1NzA1IDU3MDUsNTcwNWwxNTI1MiAwIDI2IC0xNTEyOCAtMzkzMCAwYy01MTEsMCAtOTI1LC00MTMgLTkyNywtOTI0bC0xOSAtNDg3NmMtMiwtNTE0IDQxNCwtOTMxIDkyNywtOTMxbDM5MjMgMCAwIC00NzEyYzAsLTU0NjggMzM0MCwtODQ0NSA4MjE3LC04NDQ1bDQwMDMgMGM1MTIsMCA5MjcsNDE1IDkyNyw5MjdsMCA0MTEyYzAsNTEyIC00MTUsOTI3IC05MjcsOTI3bC0yNDU2IDFjLTI2NTMsMCAtMzE2NiwxMjYxIC0zMTY2LDMxMTBsMCA0MDc5IDU4MjkgMGM1NTUsMCA5ODYsNDg1IDkyMSwxMDM3bC01NzggNDg3NmMtNTUsNDY3IC00NTEsODE4IC05MjEsODE4bC01MjI1IDAgLTI2IDE1MTI4IDkwNzUgMGMzMTUxLDAgNTcwNSwtMjU1NCA1NzA1LC01NzA1bDAgLTMwOTI0YzAsLTMxNTEgLTI1NTQsLTU3MDUgLTU3MDUsLTU3MDV6Ij48L3BhdGg+Cjwvc3ZnPg==");
}
.top-nav-li-cnr .top-nav-a{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBvbHlnb24gZmlsbD0iI0YxRjFGMSIgcG9pbnRzPSIzNzM5NSw4MTE0IDIxMTY3LDI0MzQyIDQ5MzksODExNCAwLDEzMDUzIDIxMTY3LDM0MjE5IDQyMzM0LDEzMDUzICI+PC9wb2x5Z29uPgo8L3N2Zz4=");
}
.top-srch-bttn{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBhdGggZmlsbD0iIzJCM0U0NyIgZD0iTTEzNTMgMzg1NjBsMTAwNzYgLTEwNDgwYy0yNTkxLC0zMDgwIC00MDEwLC02OTU1IC00MDEwLC0xMDk4OSAwLC05NDI1IDc2NjgsLTE3MDkzIDE3MDkzLC0xNzA5MyA5NDI1LDAgMTcwOTMsNzY2OCAxNzA5MywxNzA5MyAwLDk0MjUgLTc2NjgsMTcwOTMgLTE3MDkzLDE3MDkzIC0zNTM4LDAgLTY5MTAsLTEwNjcgLTk3OTMsLTMwOTNsLTEwMTUyIDEwNTU5Yy00MjQsNDQxIC05OTUsNjg0IC0xNjA3LDY4NCAtNTc5LDAgLTExMjgsLTIyMSAtMTU0NSwtNjIyIC04ODYsLTg1MiAtOTE0LC0yMjY2IC02MiwtMzE1M3ptMjMxNTkgLTM0MTAyYy02OTY2LDAgLTEyNjM0LDU2NjcgLTEyNjM0LDEyNjM0IDAsNjk2NyA1NjY4LDEyNjM0IDEyNjM0LDEyNjM0IDY5NjcsMCAxMjYzNCwtNTY2NyAxMjYzNCwtMTI2MzQgMCwtNjk2NyAtNTY2OCwtMTI2MzQgLTEyNjM0LC0xMjYzNHoiPjwvcGF0aD4KPC9zdmc+");
}
.sl-cntrls-l,.sl-cntrls-r{
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZlcnNpb249IjEuMSIgc3R5bGU9InNoYXBlLXJlbmRlcmluZzpnZW9tZXRyaWNQcmVjaXNpb247IHRleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjsgaW1hZ2UtcmVuZGVyaW5nOm9wdGltaXplUXVhbGl0eTsgZmlsbC1ydWxlOmV2ZW5vZGQ7IGNsaXAtcnVsZTpldmVub2RkIiB2aWV3Qm94PSIwIDAgNDIzMzMgNDIzMzMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPHBvbHlnb24gZmlsbD0id2hpdGUiIHBvaW50cz0iMTMwNzgsLTEgODA4Niw0OTkxIDI0MjYyLDIxMTY2IDgwODYsMzczNDEgMTMwNzgsNDIzMzMgMzQyNDYsMjExNjYgIj48L3BvbHlnb24+Cjwvc3ZnPg==");
}
.logo{
    background-image: url(/templates/ver2020/img/logo.png);
}

.blueimp-gallery>.next{
    background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDc4LjQ0OCA0NzguNDQ4IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NzguNDQ4IDQ3OC40NDg7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiI+PGc+PGc+Cgk8Zz4KCQk8cG9seWdvbiBzdHlsZT0iZmlsbDojRkZGRkZGIiBwb2ludHM9IjEzMS42NTksMCAxMDAuNDk0LDMyLjAzNSAzMTMuODA0LDIzOS4yMzIgMTAwLjQ5NCw0NDYuMzczIDEzMS42NSw0NzguNDQ4ICAgICAzNzcuOTU0LDIzOS4yMzIgICAiIGRhdGEtb3JpZ2luYWw9IiMwMTAwMDIiIGNsYXNzPSJhY3RpdmUtcGF0aCIgZGF0YS1vbGRfY29sb3I9IiMwMTAwMDIiPjwvcG9seWdvbj4KCTwvZz4KPC9nPjwvZz4gPC9zdmc+);
}
.blueimp-gallery>.prev{
    background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDM3MC44MTQgMzcwLjgxNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzcwLjgxNCAzNzAuODE0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PGc+Cgk8Zz4KCQk8cG9seWdvbiBwb2ludHM9IjI5Mi45MiwyNC44NDggMjY4Ljc4MSwwIDc3Ljg5NSwxODUuNDAxIDI2OC43ODEsMzcwLjgxNCAyOTIuOTIsMzQ1Ljk2MSAxMjcuNjM4LDE4NS40MDEgICAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcG9seWdvbj4KCTwvZz4KPC9nPjwvZz4gPC9zdmc+);
}
.blueimp-gallery>.close{
    background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDQ5Ljk5OCA0NDkuOTk4IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NDkuOTk4IDQ0OS45OTg7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgY2xhc3M9IiI+PGc+PGc+Cgk8Zz4KCQk8cG9seWdvbiBzdHlsZT0iZmlsbDojRkZGRkZGIiBwb2ludHM9IjQ0OS45NzQsMzQuODU1IDQxNS4xOTEsMCAyMjUuMDA3LDE5MC4xODQgMzQuODM5LDAgMC4wMjQsMzQuODM5IDE5MC4xOTIsMjI0Ljk5OSAgICAgMC4wMjQsNDE1LjE1OSAzNC44MzksNDQ5Ljk5OCAyMjUuMDA3LDI1OS43OTcgNDE1LjE5MSw0NDkuOTk4IDQ0OS45NzQsNDE1LjE0MyAyNTkuODMsMjI0Ljk5OSAgICIgZGF0YS1vcmlnaW5hbD0iIzAxMDAwMiIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAxMDAwMiI+PC9wb2x5Z29uPgoJPC9nPgo8L2c+PC9nPiA8L3N2Zz4=);
}


/* desktop */
.desktop .wh-a:hover,.desktop .top-nav-sub-a:hover,.desktop .n-a:hover,.desktop .pht-a:hover,.desktop .clndr-ds-a:hover,.desktop .clndr-a:hover{
    text-decoration: none;
}
.desktop .sl-mr-l:hover{
    text-decoration: none;
}

.desktop .pre-h-addr-soc:hover,.desktop .logo:hover,.desktop .top-nav-a:hover,.desktop .top-srch-bttn:hover,.desktop .bttn1:hover{
    opacity: .8;
}

.desktop .sl-cntrls-l:hover,.desktop .sl-cntrls-r:hover{
    opacity: .8;
}

.desktop .slick-dots li:hover{
    transform: scale(1.35);
}

.desktop .top-nav-li-cnr:hover .top-nav-sub-ul{
    visibility:visible;
    opacity:1;
    transform:translateY(0);
}

/* media */
@media screen and (max-width:1199px) {
    
    .header-fl {
        flex-wrap: wrap;
        justify-content: center;
    }
    .logo,.ph-wr {
        width: 40em;
        text-align: center;
    }
    .top-nav-fl {
        flex-wrap: wrap;
        justify-content: center;
    }
    .top-nav-ul {
        width: 100%;
        justify-content: center;
        margin-bottom: 1em;
    }
    .main {
        width: 70%;
    }
    .n-it {
        width: 100%;
    }
    .n-img-wr{
        max-width: 10em;
    }
    .aside {
        width: 27%;
        margin: 0 0 0 3%;
    }
    .aside .bttn1 {
        width: 94%;
        padding: .7em 3%;
    }
    
}

@media screen and (max-width:799px){
    
    .header,.pre-f{
        /*background-image: url(/templates/ver2020/img/bg-800.jpg);*/
    }
    .pre-h-fl {
        flex-wrap: wrap;
    }
    .wh-a {
        width: 100%;
        text-align: center;
        margin: 0 auto 1em;
    }
    .pre-h-addr {
        flex-wrap: wrap;
        justify-content: center;
        margin: auto;
    }
    .pre-h-addr-m {
        text-align: center;
        margin-bottom: 1em;
        width: 100%;
    }
    .soc-smap{
        margin-left:0;
    }
    .header-fl {
        padding: 1em;
    }
    .logo {
        width: 100%;
        font-size: .8em;
        padding: .5em 0 .5em 4em;
        background-size: 3.5em;
    }
    .ph-wr {
        width: 100%;
        font-size: .8em;
        margin-top: 1em;
    }
    .top-nav-ul {
        flex-wrap: wrap;
        font-size: .9em;
    }
    .top-nav-a {
        margin:.5em;
    }
    .top-nav-li-cnr .top-nav-a {
        padding-right: 0;
        background: none;
    }
    .top-nav-sub-ul {
        display: none;
    }
    .main-wr {
        flex-wrap: wrap;
    }
    .main,.aside {
        width: 100%;
    }
    .aside {
        margin: 3em 0 0;
    }
    .h2 {
        text-align: center;
    }
    .sl-cntrls{
        justify-content: center;
        padding: 0;
    }
    .n-it {
        justify-content: center;
    }
    .n-ttl {
        text-align: center;
    }
    .n-img,.n-desk {
        width: 100%;
    }
    .n-desk-p {
        max-width: 18em;
        margin: 1em auto;
        text-align: center;
    }
    .n-a {
        text-align: center;
        margin:0;
    }
    .pht-wr {
        flex-wrap: wrap;
    }
    .pht-it {
        width: 100%;
        margin-bottom:2em;
    }
    .pht-img {
        display: block;
        margin: auto;
        max-width: 15em;
    }
    .pht-ttl {
        max-width: 15em;
        margin: 1em auto;
        text-align: center;
    }
    .pht-date {
        width: 100%;
        display: block;
        text-align: center;
    }
    .bttn1 {
        margin: 1em auto;
    }
    .clndr-wr {
        max-width: 15em;
        margin: auto;
    }
    .as-map {
        max-width: 15em;
        margin: 1em auto;
    }
    .w30-wr {
        flex-wrap: wrap;
    }
    .w30-it {
        width: 100%;
        margin: 0 0 2em;
        text-align: center;
    }
    .w30-ttl {
        text-align: center;
    }
    .pw100 {
        font-size: 1em;
    }
}

/* ie */
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none){
    
    .soc-smap{
        background-image: url(/templates/ver2020/img/png/smap.png);
    }
    .soc-inst{
        background-image: url(/templates/ver2020/img/png/insta.png);
    }
    .soc-vk{
        background-image: url(/templates/ver2020/img/png/vk.png);
    }
    .soc-yt{
        background-image: url(/templates/ver2020/img/png/yt.png);
    }
    .soc-fb{
        background-image: url(/templates/ver2020/img/png/fb.png);
    }
    .top-nav-li-cnr .top-nav-a{
        background-image: url(/templates/ver2020/img/png/bttm.png);
    }
    .top-srch-bttn{
        background-image: url(/templates/ver2020/img/png/srch.png);
    }
    .sl-cntrls-l,.sl-cntrls-r{
        background-image: url(/templates/ver2020/img/png/rght.png);
    }
    .blueimp-gallery>.next{
        background-image: url(/templates/ver2020/img/png/next.png);
    }
    .blueimp-gallery>.prev{
        background-image: url(/templates/ver2020/img/png/prev.png);
    }
    .blueimp-gallery>.close{
        background-image: url(/templates/ver2020/img/png/close.png);
    }

}
</style>


<?php if($_SESSION["font"] > 0) {?>
	<style>
	#contrast-scheme * {
		font-size: <?php echo $_SESSION["font"]?>px !important;
	}
	</style>
<?php } ?>

</head>
<body class="RL">
<div class="pre-h">
    <div class="w1200 pre-h-fl">
        <a href="/" class="wh-a">Версия для слабовидящих</a>
        <div class="pre-h-addr">
            <div class="pre-h-addr-m">Адрес электронной почты: <a class="mail-link" href="mailto:<?php echo Content::$email;?>"><?php echo Content::$email;?></a></div>
            <a href="/site_map" class="pre-h-addr-soc soc-smap"></a>
            <?=((empty(Content::$url_inst)) ? "" : '<a href="' . Content::$url_inst . '" class="pre-h-addr-soc soc-inst"></a>')?>
            <?=((empty(Content::$url_vk)) ? "" : '<a href="' . Content::$url_vk . ' class="pre-h-addr-soc soc-vk"></a>')?>
            <?=((empty(Content::$url_yt)) ? "" : '<a href="' . Content::$url_yt . '" class="pre-h-addr-soc soc-yt"></a>')?>
            <?=((empty(Content::$url_fb)) ? "" : '<a href="' . Content::$url_fb . '" class="pre-h-addr-soc soc-fb"></a>')?>
        </div>
    </div>
</div>
<header class="header">
    <div class="w1200 header-fl">
        <a href="/" class="RCB logo"><?php echo Content::$logo_title;?></a>
        <div class="ph-wr">
		<? foreach(Content::$short_contacts as $contact): ?>
			<?=$contact["title"]?> <a href="tel:<?=$contact["phone"]?>" class="RCB ph-it"><?=$contact["phone"]?></a><br/>
		<? endforeach; ?>
		Пн-Чт с 9:00 до 18:00, Пт с 9:00 до 17:00<br/>Выходные: Сб, Вс, праздничные дни</div>
    </div>
</header>
<nav class="top-nav">
    <div class="w1200 top-nav-fl">
        <ul class="top-nav-ul">
			<? //Content::$topmenu ?>
		
			<? foreach(Content::$topmenu as $title => $url): ?>
				<? if(is_array($url)): ?>
					<li class="top-nav-li top-nav-li-cnr">
						<a href="/" class="RCB top-nav-a"><?=$title?></a>
						<ul class="top-nav-sub-ul">
							<? foreach($url as $title1 => $url1): ?>
							<li class="top-nav-sub-li"><a href="<?=$url1?>" class="top-nav-sub-a"><?=$title1?></a></li>
							<? endforeach;?>
						</ul>
					</li>
				<? else: ?>
					<li class="top-nav-li"><a href="<?=$url?>" class="RCB top-nav-a"><?=$title?></a></li>
				<? endif; ?>
			
			<? endforeach;?>

        </ul>
        <div class="top-srch">
            <input type="text" class="top-srch-inp" placeholder="Поиск...">
            <div class="top-srch-bttn"></div>
        </div>
    </div>
</nav>
<div class="w1200 main-wr">
    <main class="main">
		<?php if ("news" == Controller::$bodyUrl) { ?>
			<?php require_once 'news.php';?>	
			
		<?php } elseif  ("" == Controller::$bodyUrl) { ?>
			<?php require_once 'summary.php';?>	

		<?php } elseif  ("gallery" == Controller::$bodyUrl) { ?>
			<?php require_once 'gallery.php';?>		
			
		<?php } elseif  ("tournament" == Controller::$bodyUrl) { ?>
			<?php require_once 'tournament.php';?>		
			
		<?php } else {?>
				<?php require_once 'content.php';?>	
			
		<?php } ?>
    </main>
    <aside class="aside">
        <img src="/templates/ver2020/img/minspkrd.png" alt="Министерство спорта Краснодарского края" class="as-flg">
        <img src="/templates/ver2020/img/minsprf.png" alt="Министерство спорта России" class="as-flg">
        <div class="clndr-wr">
			<?
				$month = date("m");
				$months = array(
					"Январь",
					"Февраль",
					"Март",
					"Апрель",
					"Май",
					"Июнь",
					"Июль",
					"Август",
					"Сентябрь",
					"Октябрь",
					"Ноябрь",
					"Декабрь",
				);
			?>
            <div class="RCB clndr-ttl">События</div>
            <div class="clndr-ds">
                <div class="clndr-ds-it clndr-ds-it-dact">30</div>
				<div class="clndr-ds-it clndr-ds-it-dact">31</div>
                <div class="clndr-ds-it"><a class="clndr-ds-a" href="/">1</a></div>
                <div class="clndr-ds-it">2</div>
                <div class="clndr-ds-it">3</div>
                <div class="clndr-ds-it"><a class="clndr-ds-a" href="/">4</a></div>
                <div class="clndr-ds-it">5</div>
                <div class="clndr-ds-it">6</div>
                <div class="clndr-ds-it">7</div>
                <div class="clndr-ds-it">8</div>
                <div class="clndr-ds-it">9</div>
                <div class="clndr-ds-it">10</div>
                <div class="clndr-ds-it">11</div>
                <div class="clndr-ds-it">12</div>
                <div class="clndr-ds-it">13</div>
                <div class="clndr-ds-it">14</div>
                <div class="clndr-ds-it">15</div>
                <div class="clndr-ds-it">16</div>
                <div class="clndr-ds-it">17</div>
                <div class="clndr-ds-it">18</div>
                <div class="clndr-ds-it">19</div>
                <div class="clndr-ds-it">20</div>
                <div class="clndr-ds-it">21</div>
                <div class="clndr-ds-it">22</div>
                <div class="clndr-ds-it">23</div>
                <div class="clndr-ds-it">24</div>
                <div class="clndr-ds-it">25</div>
                <div class="clndr-ds-it"><a class="clndr-ds-a" href="/">26</a></div>
                <div class="clndr-ds-it"><a class="clndr-ds-a" href="/">27</a></div>
                <div class="clndr-ds-it"><a class="clndr-ds-a" href="/">28</a></div>
                <div class="clndr-ds-it"><a class="clndr-ds-a" href="/">29</a></div>
                <div class="clndr-ds-it">30</div>
                <div class="clndr-ds-it">31</div>
                <div class="clndr-ds-it clndr-ds-it-dact">1</div>
                <div class="clndr-ds-it clndr-ds-it-dact">2</div>
            </div>
            <!--div class="clndr-mnth">Январь<?=$months[$month]?></div>
            <a href="/" class="clndr-a">1-30 ноября 2019 года</a>
            <div class="clndr-desk">Календарь первенств России и других всероссийских официальных соревнований среди юношей</div>
            <a href="/" class="clndr-a">1-30 ноября 2019 года</a>
            <div class="clndr-desk">Календарь первенств России и других всероссийских официальных соревнований среди юношей</div>
            <a href="/" class="bttn1">Все события</a-->
			<div class="clndr-mnth">Январь</div>
			<a href="/tournament" class="clndr-a">Электронная регистрация</a>
            <div class="clndr-desk">Открыта электронная регистрация на соревнования</div>
        </div>
        <div class="as-map">
           <?php require_once 'map.php';?>
        </div>
    </aside>
</div>
<div class="pre-f">
    <div class="w1200">
        <h2 class="RCB h2">Телефоны горячей линии</h2>
        <p class="pw100">В соответствии с распоряжением главы администрации (губернатора) Краснодарского края от 8 июля 2004 года № 805-р «О мерах направленных на погашение предприятиями края задолженности по заработной плате», а также с целью оперативного и своевременного выявления случаев невыплаты заработной платы работникам предприятий, осуществляющих деятельность на территории Краснодарского края, в соответствующих органах власти работают телефоны «горячая линия»</p>
        <div class="w30-wr">
            <div class="w30-it">
                <div class="RCB w30-ttl">8 (861) 991-09-55</div>
                <div class="w30-desk">Государственная инспекция труда в Краснодарском крае</div>
            </div>
            <div class="w30-it">
                <div class="RCB w30-ttl">8 (861) 210-70-50</div>
                <div class="w30-desk">Министерство экономики Краснодарского края</div>
            </div>
            <div class="w30-it">
                <div class="RCB w30-ttl">8 (861) 252-33-15</div>
                <div class="w30-desk">Министерство труда и социального развития Краснодарского края</div>
            </div>
        </div>
        <p class="pw100"></p>
    </div>
</div>
<footer class="footer">
    <div class="f-copy w1200"><?=Content::$footer . date("Y")?></div>
</footer>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <a class="prev"></a>
    <a class="next"></a>
    <a class="close"></a>
    <ol class="indicator"></ol>
</div>

<script>
/*! device.js 0.2.7 */
(function(){var a,b,c,d,e,f,g,h,i,j;b=window.device,a={},window.device=a,d=window.document.documentElement,j=window.navigator.userAgent.toLowerCase(),a.ios=function(){return a.iphone()||a.ipod()||a.ipad()},a.iphone=function(){return!a.windows()&&e("iphone")},a.ipod=function(){return e("ipod")},a.ipad=function(){return e("ipad")},a.android=function(){return!a.windows()&&e("android")},a.androidPhone=function(){return a.android()&&e("mobile")},a.androidTablet=function(){return a.android()&&!e("mobile")},a.blackberry=function(){return e("blackberry")||e("bb10")||e("rim")},a.blackberryPhone=function(){return a.blackberry()&&!e("tablet")},a.blackberryTablet=function(){return a.blackberry()&&e("tablet")},a.windows=function(){return e("windows")},a.windowsPhone=function(){return a.windows()&&e("phone")},a.windowsTablet=function(){return a.windows()&&e("touch")&&!a.windowsPhone()},a.fxos=function(){return(e("(mobile;")||e("(tablet;"))&&e("; rv:")},a.fxosPhone=function(){return a.fxos()&&e("mobile")},a.fxosTablet=function(){return a.fxos()&&e("tablet")},a.meego=function(){return e("meego")},a.cordova=function(){return window.cordova&&"file:"===location.protocol},a.nodeWebkit=function(){return"object"==typeof window.process},a.mobile=function(){return a.androidPhone()||a.iphone()||a.ipod()||a.windowsPhone()||a.blackberryPhone()||a.fxosPhone()||a.meego()},a.tablet=function(){return a.ipad()||a.androidTablet()||a.blackberryTablet()||a.windowsTablet()||a.fxosTablet()},a.desktop=function(){return!a.tablet()&&!a.mobile()},a.television=function(){var a;for(television=["googletv","viera","smarttv","internet.tv","netcast","nettv","appletv","boxee","kylo","roku","dlnadoc","roku","pov_tv","hbbtv","ce-html"],a=0;a<television.length;){if(e(television[a]))return!0;a++}return!1},a.portrait=function(){return window.innerHeight/window.innerWidth>1},a.landscape=function(){return window.innerHeight/window.innerWidth<1},a.noConflict=function(){return window.device=b,this},e=function(a){return-1!==j.indexOf(a)},g=function(a){var b;return b=new RegExp(a,"i"),d.className.match(b)},c=function(a){var b=null;g(a)||(b=d.className.replace(/^\s+|\s+$/g,""),d.className=b+" "+a)},i=function(a){g(a)&&(d.className=d.className.replace(" "+a,""))},a.ios()?a.ipad()?c("ios ipad tablet"):a.iphone()?c("ios iphone mobile"):a.ipod()&&c("ios ipod mobile"):a.android()?c(a.androidTablet()?"android tablet":"android mobile"):a.blackberry()?c(a.blackberryTablet()?"blackberry tablet":"blackberry mobile"):a.windows()?c(a.windowsTablet()?"windows tablet":a.windowsPhone()?"windows mobile":"desktop"):a.fxos()?c(a.fxosTablet()?"fxos tablet":"fxos mobile"):a.meego()?c("meego mobile"):a.nodeWebkit()?c("node-webkit"):a.television()?c("television"):a.desktop()&&c("desktop"),a.cordova()&&c("cordova"),f=function(){a.landscape()?(i("portrait"),c("landscape")):(i("landscape"),c("portrait"))},h=Object.prototype.hasOwnProperty.call(window,"onorientationchange")?"orientationchange":"resize",window.addEventListener?window.addEventListener(h,f,!1):window.attachEvent?window.attachEvent(h,f):window[h]=f,f(),"function"==typeof define&&"object"==typeof define.amd&&define.amd?define(function(){return a}):"undefined"!=typeof module&&module.exports?module.exports=a:window.device=a}).call(this);

let scr_jquery = document.createElement('script');
scr_jquery.src = '/templates/ver2020/js/jquery-3.3.1.min.js';
scr_jquery.async = false;
document.head.appendChild(scr_jquery);
scr_jquery.onload = function() {
    jQuery(document).ready(function(){
        
        let scr_slick = document.createElement('script');
        scr_slick.src = '/templates/ver2020/js/slick.min.js';
        scr_slick.async = false;
        document.head.appendChild(scr_slick);
        scr_slick.onload = function() {

            jQuery('.sl-fl').slick({
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 5000,
                nextArrow: jQuery('#sl-cntrls-r'),
                prevArrow: jQuery('#sl-cntrls-l'),
                dots: true,
                appendDots: jQuery("#sl-cntrls-dots"),
                cssEase: "ease-out",
                pauseOnHover: false,
                fade: true,
            });
            
        }
        
        let scr_blueimp = document.createElement('script');
        scr_blueimp.src = '/templates/ver2020/js/blueimp-gallery.min.js';
        scr_blueimp.async = false;
        document.head.appendChild(scr_blueimp);
        scr_blueimp.onload = function() {
            
            jQuery("body").on( "click", ".gall_cont", function(event) {
                event = event || window.event;
                let target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event,hidePageScrollbars: false},
                links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            });
            
        }

    });
}
</script>

</body></html>

<?
	}
?>