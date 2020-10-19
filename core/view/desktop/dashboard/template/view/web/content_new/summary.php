		        <div class="sl">
            <div class="sl-fl">
                
                <div class="sl-sl-wr" style="background-image: url(/settings/csp2/images/1401202001.jpg)">
                    <div class="sl-sl">
                        <div class="sl-date">13.01.2020</div>
                        <div class="RCB sl-ttl">Открыта электронная регистрация на соревнования</div>
                        <a href="/tournament" class="sl-mr-l">Зарегистрироваться</a>
                    </div>
                </div>
                
				<? if(count(Content::$news) > 0) :?>
				
                <div class="sl-sl-wr" style="background-image: url(<?=Content::$news[0]["photo"]?>)">
                    <div class="sl-sl">
                        <div class="sl-date"><?=Content::$news[0]["date"]?></div>
                        <div class="RCB sl-ttl"><?=Content::$news[0]["title"]?></div>
                        <a href="/news?nid=0" class="sl-mr-l">Подробнее</a>
                    </div>
                </div>
                
				<? endif; ?>
                
            </div>
            <div class="sl-cntrls">
                <div id="sl-cntrls-l" class="sl-cntrls-l"></div>
                <div id="sl-cntrls-dots" class="sl-cntrls-dots"></div>
                <div id="sl-cntrls-r" class="sl-cntrls-r"></div>
            </div>
        </div>
		
		
        <section class="section">
            <h2 class="RCB h2">Новости</h2>
            <div class="n-wr">
				<? $i=0; foreach(Content::$news as $indx => $news_item ): $i++; if($i>6) break;?>
			
                <article class="n-it">
                    <time class="n-date"><?=$news_item["date"]?></time>
                    <h3 class="RCB n-ttl"><?=$news_item["title"]?></h3>
					<div class="n-img-wr">
                    <img src="<?=$news_item["photo"]?>" alt="<?=$news_item["title"]?>" class="n-img"/>
					</div>
                    <div class="n-desk">
                        <p class="n-desk-p"><?=$news_item["anons"]?></p>
                        <a href="/news?nid=<?=$indx;?>" class="n-a">Подробнее</a>
                    </div>
                </article>
                
				<? endforeach; ?>
            </div>
            <a href="/news" class="bttn1">Все новости</a>
        </section>
        <section class="section">
            <h2 class="RCB h2">Фото материалы</h2>
            <div class="pht-wr">
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
						$album_title = array_pop($album);
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
						'6tour12012020' => '6-й тур 11-12.01.2020 г.',
						'pfpr0506lab' => 'Полуфинал ПР 2005-2006 г.р., юноши, г. Лабинск',
						'pfpr0506dvolg' => 'Полуфинал ПР 2005-2006 г.р., девушки, г. Волгоград',
						'6tour150120' => '6-й тур, 14-15.01.2020 г.',
						'pkkprs0405' => 'Предварительные соревнования ПКК, девушки, 2004-2005 г.р.',
						'lokovol0304' => 'Локоволей, девушки 2003-2004 г.р.',
						'fin0304kaliningrad' => 'Финал девушки 2003-2004 г.р., г. Калининград',
					);
						$i=0;
					foreach($albums as $album => $data) { 
						$i++;
				?>
					<article class="pht-it" style="overflow: hidden">
						<img src="<?php echo $data["thumbs"][0] ?>" alt="Церемония награждения" class="pht-img" style="height: 60%; width: 90%;"/>
						<a href="/gallery?album=<?php echo $albumUrl . $album?>" class="pht-a"><h3 class="pht-ttl"><?php echo $titles[$album];?></h3></a>
						<!--time class="pht-date">07.11.2019</time-->
					</article>
				<?php 
					if(0 == ($i % 4)) break;
					}
				?>
			
			
                
            </div>            
            <a href="/gallery" class="bttn1">Все публикации</a>
        </section>
		<? /*
        <section class="section">
            <h2 class="RCB h2">Видео материалы</h2>
            <div class="pht-wr">
                <article class="pht-it">
                    <img src="/img/news.png" alt="Церемония награждения" class="pht-img"/>
                    <a href="/" class="pht-a"><h3 class="pht-ttl">Церемония награждения победителей и призеров летней спартакиады</h3></a>
                    <time class="pht-date">07.11.2019</time>
                </article>
                <article class="pht-it">
                    <img src="/img/news.png" alt="Церемония награждения" class="pht-img"/>
                    <a href="/" class="pht-a"><h3 class="pht-ttl">Церемония награждения победителей и призеров летней спартакиады</h3></a>
                    <time class="pht-date">07.11.2019</time>
                </article>
                <article class="pht-it">
                    <img src="/img/news.png" alt="Церемония награждения" class="pht-img"/>
                    <a href="/" class="pht-a"><h3 class="pht-ttl">Церемония награждения победителей и призеров летней спартакиады</h3></a>
                    <time class="pht-date">07.11.2019</time>
                </article>
            </div>
            <a href="/" class="bttn1">Все публикации</a>
        </section>
		*/ ?>