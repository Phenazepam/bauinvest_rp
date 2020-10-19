<?

	namespace RedCore;

	define('SEP'          , '/');
	define('CMS_HELPER'   , CMS_DIR . SEP . 'helpers');
	require_once(CMS_HELPER . SEP . 'db/db.php');

	class Config {
		public static $db				= true;
		public static $dbHost	 		= 'localhost';
		public static $dbName 			= 'westernsru_elreg';
		public static $dbUser 			= 'westernsru_elreg';
		public static $dbPassword 		= 'wes324@terW';
		public static $dbType 			= 'mysql';
		public static $dbTablePrefix	= 'elreg__';
		public static $dbDebug 			= false;
	}

	if (Config::$db) {
		$db = new db();
		$db->connect();
		mysql_set_charset($db, utf8);
		mb_internal_encoding("UTF-8");
		$db->execute('SET SQL_BIG_SELECTS=1');
	}	
	
	$tour_list = array(
		"1" => "Первенство краснодарского края по волейболу<br>среди команд девушек 2004 – 2006 гг. р. (2006 г.р. - не более трех человек)",
		"2" => "Первенство краснодарского края по волейболу<br>среди команд юношей 2004 – 2006 гг. р. (2006 г.р. - не более трех человек)",
		"3" => "Первенство краснодарского края по волейболу<br>среди команд девушек 2006 – 2008 гг. р. (2008 г.р. - не более трех человек)",
		"4" => "Первенство краснодарского края по волейболу<br>среди команд юношей 2006 – 2008 гг. р. (2008 г.р. - не более трех человек)",
		"5" => "Первенство краснодарского края по волейболу<br>среди команд девушек 2008 – 2011 гг. р. (2010, 2011 г.р. - не более двух человек)",
		"6" => "Первенство краснодарского края по волейболу<br>среди команд юношей 2008 – 2011 гг. р. (2010, 2011 г.р. - не более двух человек)",
		"7" => "Кубок краснодарского края по волейболу<br>среди женских команд 2005 г.р. и старше ",
		"8" => "Кубок краснодарского края по волейболу<br>среди мужских команд 2005 г.р. и старше ",
		"9" => "Чемпионат краснодарского края по волейболу<br>среди женских команд 2005 г.р. и старше ",
		"10" => "Чемпионат краснодарского края по волейболу<br>среди мужских команд 2005 г.р. и старше ",
	);
	
	$tour_list_gender = array(
		"1" => array(2),
		"2" => array(1),
		"3" => array(2),
		"4" => array(1),
		"5" => array(2),
		"6" => array(1),
		"7" => array(2),
		"8" => array(1),
		"9" => array(2),
		"10" => array(1),
	);
	
	$list_years = array(
		"1900" => "1900",
		"1901" => "1901",
		"1902" => "1902",
		"1903" => "1903",
		"1904" => "1904",
		"1905" => "1905",
		"1906" => "1906",
		"1907" => "1907",
		"1908" => "1908",
		"1909" => "1909",
		"1910" => "1910",
		"1911" => "1911",
		"1912" => "1912",
		"1913" => "1913",
		"1914" => "1914",
		"1915" => "1915",
		"1916" => "1916",
		"1917" => "1917",
		"1918" => "1918",
		"1919" => "1919",
		"1920" => "1920",
		"1921" => "1921",
		"1922" => "1922",
		"1923" => "1923",
		"1924" => "1924",
		"1925" => "1925",
		"1926" => "1926",
		"1927" => "1927",
		"1928" => "1928",
		"1929" => "1929",
		"1930" => "1930",
		"1931" => "1931",
		"1932" => "1932",
		"1933" => "1933",
		"1934" => "1934",
		"1935" => "1935",
		"1936" => "1936",
		"1937" => "1937",
		"1938" => "1938",
		"1939" => "1939",
		"1940" => "1940",
		"1941" => "1941",
		"1942" => "1942",
		"1943" => "1943",
		"1944" => "1944",
		"1945" => "1945",
		"1946" => "1946",
		"1947" => "1947",
		"1948" => "1948",
		"1949" => "1949",
		"1950" => "1950",
		"1951" => "1951",
		"1952" => "1952",
		"1953" => "1953",
		"1954" => "1954",
		"1955" => "1955",
		"1956" => "1956",
		"1957" => "1957",
		"1958" => "1958",
		"1959" => "1959",
		"1960" => "1960",
		"1961" => "1961",
		"1962" => "1962",
		"1963" => "1963",
		"1964" => "1964",
		"1965" => "1965",
		"1966" => "1966",
		"1967" => "1967",
		"1968" => "1968",
		"1969" => "1969",
		"1970" => "1970",
		"1971" => "1971",
		"1972" => "1972",
		"1973" => "1973",
		"1974" => "1974",
		"1975" => "1975",
		"1976" => "1976",
		"1977" => "1977",
		"1978" => "1978",
		"1979" => "1979",
		"1980" => "1980",
		"1981" => "1981",
		"1982" => "1982",
		"1983" => "1983",
		"1984" => "1984",
		"1985" => "1985",
		"1986" => "1986",
		"1987" => "1987",
		"1988" => "1988",
		"1989" => "1989",
		"1990" => "1990",
		"1991" => "1991",
		"1992" => "1992",
		"1993" => "1993",
		"1994" => "1994",
		"1995" => "1995",
		"1996" => "1996",
		"1997" => "1997",
		"1998" => "1998",
		"1999" => "1999",
		"2000" => "2000",
		"2001" => "2001",
		"2002" => "2002",
		"2003" => "2003",
		"2004" => "2004",
		"2005" => "2005",
		"2006" => "2006",
		"2007" => "2007",
		"2008" => "2008",
		"2009" => "2009",
		"2010" => "2010",
		"2011" => "2011",
		"2012" => "2012",
		"2013" => "2013",
		"2014" => "2014",
		"2015" => "2015",
		"2016" => "2016",
		"2017" => "2017",
		"2018" => "2018",
		"2019" => "2019",
		"2020" => "2020",
	);
	
	$tour_list_years = array(
		"1" => array("2004", "2005", "2006"),
		"2" => array("2004", "2005", "2006"),
		"3" => array("2006", "2007", "2008"),
		"4" => array("2006", "2007", "2008"),
		"5" => array("2008", "2009", "2010", "2011"),
		"6" => array("2008", "2009", "2010", "2011"),
		"7" => array("2005", "2004", "2003", "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990", "1989", "1988", "1987", "1986", "1985", "1984", "1983", "1982", "1981", "1980"),
		"8" => array("2005","2004", "2003", "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990", "1989", "1988", "1987", "1986", "1985", "1984", "1983", "1982", "1981", "1980"),
		"9" => array("2005","2004", "2003", "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990", "1989", "1988", "1987", "1986", "1985", "1984", "1983", "1982", "1981", "1980"),
		"10" => array("2005","2004", "2003", "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990", "1989", "1988", "1987", "1986", "1985", "1984", "1983", "1982", "1981", "1980"),
	);

	$mo_list = array(
		"1" => "Город Краснодар",
		"2" => "Город-курорт Анапа",
		"3" => "Город Армавир",
		"4" => "Город-курорт Геленджик",
		"5" => "Город Горячий Ключ",
		"6" => "Город-герой Новороссийск",
		"7" => "Город-курорт Сочи",
		"8" => "Абинский район",
		"9" => "Апшеронский район",
		"10" => "Белоглинский район",
		"11" => "Белореченский район",
		"12" => "Брюховецкий район	",
		"13" => "Выселковский район",
		"14" => "Гулькевичский район",
		"15" => "Динской район",
		"16" => "Ейский район",
		"17" => "Кавказский район",
		"18" => "Калининский район",
		"19" => "Каневской район",
		"20" => "Кореновский район",
		"21" => "Красноармейский район",
		"22" => "Крыловский район",
		"23" => "Крымский район",
		"24" => "Курганинский район",
		"25" => "Кущевский район",
		"26" => "Лабинский район",
		"27" => "Ленинградский район",
		"28" => "Мостовский район",
		"29" => "Новокубанский район",
		"30" => "Новопокровский район",
		"31" => "Отрадненский район",
		"32" => "Павловский район",
		"33" => "Приморско-Ахтарский район",
		"34" => "Северский район",
		"35" => "Славянский район",
		"36" => "Староминский район",
		"37" => "Тбилисский район",
		"38" => "Темрюкский район",
		"39" => "Тимашевский район",
		"40" => "Тихорецкий район",
		"41" => "Туапсинский район",
		"42" => "Успенский район",
		"43" => "Усть-Лабинский район",
		"44" => "Щербиновский район",
	);
	
	$gender_list = array(
		"1" => "мужской",
		"2" => "женский",
	);

?>

<style>
	 .formreg {
		
		
		
		width: 340px;
		margin-top: 15px;
	 }
	 
	 .inp_text {
		 width: 300px;
	 }
	 
	 .inp_text1 {
		 width: 130px;
	 }
	 
	 .iconfinder-icon {
		 display: block;
		 text-decoration: none;
		 border-bottom: 0px;
		 width: 30px;
		 height: 30px;
	background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAiIGhlaWdodD0iMzAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+IDxnPiAgPHRpdGxlPmJhY2tncm91bmQ8L3RpdGxlPiAgPHJlY3QgZmlsbD0ibm9uZSIgaWQ9ImNhbnZhc19iYWNrZ3JvdW5kIiBoZWlnaHQ9IjQwMiIgd2lkdGg9IjU4MiIgeT0iLTEiIHg9Ii0xIi8+IDwvZz4gPGc+ICA8dGl0bGU+TGF5ZXIgMTwvdGl0bGU+ICA8cGF0aCBpZD0ic3ZnXzIiIGZpbGwtcnVsZT0iZXZlbm9kZCIgZmlsbD0iIzQzNDQ0MCIgZD0ibTI4LjcwNSw3LjUwNmwtNS40NjEsLTYuMzMzbC0xLjA4LC0xLjI1NGwtMTIuOTAyLDBjLTEuNzMyLDAgLTMuMTMzLDEuNDAzIC0zLjEzMywzLjEzNmwwLDMuOTg1bDEuOTQyLDBsLTAuMDAxLC0zLjIyMmMwLjAwMiwtMC45NzUgMC43ODYsLTEuNzY0IDEuNzU4LC0xLjc2NGwxMS4wMzQsLTAuMDFsMCw1LjIyOGMwLjAwMiwxLjk0NyAxLjU3NSwzLjUyMyAzLjUyNCwzLjUyM2wzLjgxOSwwbC0wLjE4OCwxNS4wODFjLTAuMDAzLDAuOTcgLTAuNzksMS43NTMgLTEuNzU5LDEuNzYxbC0xNi41NywtMC4wMDhjLTAuODg3LDAgLTEuNjAxLC0wLjg3IC0xLjYwNSwtMS45NDJsMCwtMS4yNzdsLTEuOTQ1LDBsMCwxLjkwNGMwLDEuOTEyIDEuMjgyLDMuNDY4IDIuODU2LDMuNDY4bDE3LjgzMSwtMC4wMDRjMS43MzIsMCAzLjEzNywtMS40MSAzLjEzNywtMy4xMzlsMCwtMTcuNjczbC0xLjI1NywtMS40NiIgY2xpcC1ydWxlPSJldmVub2RkIi8+ICA8cGF0aCBpZD0ic3ZnXzMiIGZpbGw9IiMwODc0M0IiIGQ9Im0yMC4yMjMsMjUuMzgybC0yMC4yMjMsMGwwLC0xOS4zMTRsMjAuMjIzLDBsMCwxOS4zMTRtLTE4LjI4LC0xLjk0NGwxNi4zMzMsMGwwLC0xNS40MjZsLTE2LjMzMywwIi8+ICA8cG9seWxpbmUgaWQ9InN2Z180IiBwb2ludHM9IjE1LjczLDIwLjgyMiAxMi4zMjUsMjAuODIyIDEwLjAwMSwxNy41MzggNy41NjEsMjAuODIyIDQuMTQsMjAuODIyIDguMzg0LDE1LjQ4NiA0Ljk1NywxMC44MTcgICAgOC40MTIsMTAuODE3IDEwLjAxNiwxMy4zNTUgMTEuNzI2LDEwLjgxNyAxNS4yNDIsMTAuODE3IDExLjY0OSwxNS40ODYgMTUuNzMsMjAuODIyICAiIGZpbGw9IiMwODc0M0IiLz4gPC9nPjwvc3ZnPg==);
}
	</style>


<?php
if(isset($_GET["show_mo_stat"])) {
	if((("admin" == $_POST["login"]) AND ("csp21@2" == $_POST["password"])) OR (isset($_GET["auth"]))) {
		
		//DB
		
		$data = $db->executeAssoc("SELECT * FROM csp2_elreg");
		$items = array();
		
		while ($row = $data->FetchRow()) {
			$items[$row["id"]] = array(
				"id" => $row["id"],
				"tour_id" => $row["tour_id"],
				"reg_motrue_name" => $row["reg_motrue_name"],
				"reg_mo_name" => $row["reg_mo_name"],
				"reg_fio" => $row["reg_fio"],
				"reg_gender" => $row["reg_gender"],
				"reg_birth_year" => $row["reg_birth_year"],
			);
		}
		
		//FILE
		
		//$file=file_get_contents('regdata.txt');
		//$file = json_decode($file);
		
		//foreach($file as $row) {
		//	$rs[$row->reg_motrue_name][] = $row;
		//	echo "INSERT INTO `kubok2019` (`reg_motrue_name`, `reg_mo_name`, `reg_fio`, `reg_gender`, `reg_birth_year`) VALUES (" . 
		//	$row->reg_motrue_name . ", '" . $row->reg_mo_name . "', '" . $row->reg_fio . "', " . $row->reg_gender . ", " . $row->reg_birth_year . ");";
		//}
		
		$dubl = array();
		
		foreach($items as $row) {
			$row = (object)$row;
			$rs[$row->reg_motrue_name][] = $row;
		}
		
?>
<h2 class="RCB">Электронная регистрация на соревнования<br>
	<?=$tour_list[$_GET["tid"]]?></h2>
	<div class="">
		<div><a href='/tournament'>Перейти к списку соревнований</a></div>
		<div><a href="http://csp2.reduit-company.ru/tournament?show_mo_stat=0&tid=<?=$_GET["tid"]?>&toexcel&auth">Скачать список по всем муниципальным образованиям</a></div>
		<div><br><a target="_blanc" class="iconfinder-icon" href="http://csp2.reduit-company.ru/tournament?show_mo_stat=<?=$_GET["show_mo_stat"]?>&tid=<?=$_GET["tid"]?>&toexcel&auth"></a><br></div>
	</div>
	<div style="">
	<form method="get" action="/tournament">
		<input type="hidden" value="" name="auth">
		<input type="hidden" value="<?=$_GET["tid"]?>" name="tid">
		<h3>Муниципальное образование</h3>
		<select  class="inp_text" name="show_mo_stat">
			<option value="0" <?=(($_GET["show_mo_stat"] == 0) ? "selected" : "")?>>Все</option>
		<?
			foreach($mo_list as $id => $title) {
		?>
			<option value="<?=$id?>" <?=(($_GET["show_mo_stat"] == $id) ? "selected" : "")?>><?=$title?></option>
		<?
			}
		?>
		</select>		
<input type="submit" value="выбрать" name="send_data">		
	</form>
	<br><br><br><br>
	</div>
	

		<table border=1 cellspacing=0 cellpadding=5>
			<thead>
				<tr>
					<th>№ п/п</th>
					<th>Муниципальное образование</th>
					<th>Муниципальное учреждение</th>
					<th>Фамилия Имя Отчество</th>
					<th>Пол</th>
					<th>Год рождения</th>
				</tr>
			</thead>
			<tbody>
				<? 
					$i = 1;
					if("0" == $_GET["show_mo_stat"]) {
						$rowrs = array();
						
						foreach($rs as $mo => $rows) {
							$rowrs = array_merge($rowrs, $rows);
						}
					}
					else {
						$rowrs = $rs[$_GET["show_mo_stat"]];
					}
					foreach($rowrs as $row) { 
						if( $_GET["tid"] == $row->tour_id) {
				?>
					<tr>
						<td><?=$i++?></td>
						<td><?=$mo_list[$row->reg_motrue_name]?></td>
						<td><?=$row->reg_mo_name?></td>
						<td><?=$row->reg_fio?></td>
						<td><?=$gender_list[$row->reg_gender]?></td>
						<td><?=$row->reg_birth_year?></td>
					</tr>
				<? }
					}				?>
			</tbody>
		</table>
<?	
	}
	else {
?>
	<div id="form" class="formreg">
		<div class="row">
			<form method="post" action="/tournament?show_mo_stat=<?=$_GET["show_mo_stat"]?>&tid=<?=$_GET["tid"]?>">
				<div style="">
					<h3>Логин</h3>
					<input class="inp_text"  type="text" name="login" value="">
				</div>
				
				<div style="">
				<h3>Пароль</h3>
				<input class="inp_text" type="password" name="password" value="">
				</div>
				
				
				<div style="">
				<br>
				<input type="submit" value="отправить" name="send_data">
				</div>
			</form>
		</div>
		<div class="clear"></div>
	</div>	
<?	
	}
}
elseif(isset($_GET["show_table"])) {

	
	//DB
		
		$data = $db->executeAssoc("SELECT * FROM csp2_elreg");
		$items = array();
		$countarr = array();
		
		
		while ($row = $data->FetchRow()) {
			/*$items[$row["id"]] = array(
				"id" => $row["id"],
				"reg_motrue_name" => $row["reg_motrue_name"],
				"reg_mo_name" => $row["reg_mo_name"],
				"reg_fio" => $row["reg_fio"],
				"reg_gender" => $row["reg_gender"],
				"reg_birth_year" => $row["reg_birth_year"],
			);*/
			
			$row = (object)$row;
			$rs[$row->tour_id][$row->reg_motrue_name][$row->reg_gender][$row->reg_birth_year][] = $row;
			$countarr[$row->tour_id][$row->reg_motrue_name][$row->reg_gender][$row->reg_birth_year] = (int)$countarr[$row->reg_motrue_name][$row->reg_gender][$row->reg_birth_year] + 1;
		}
	
		
	
	/*
	foreach($items as $row) {
			$row = (object)$row;
			$rs[$row->reg_motrue_name][$row->reg_gender][$row->reg_birth_year][] = $row;
			$countarr[$row->reg_motrue_name][$row->reg_gender][$row->reg_birth_year] = $countarr[$row->reg_motrue_name][$row->reg_gender][$row->reg_birth_year] + 1;
		}
	*/
	$i = 1;
?>

<h2 class="RCB">Электронная регистрация на соревнования<br>
	<?=$tour_list[$_GET["tid"]]?><br>Свод муниципальных образований</h2>
	<div class="">
		<div><a href='/tournament'>Перейти к списку соревнований</a></div>
		<div><a href='/tournament?tid=<?=$_GET["tid"]?>'>Перейти к форме регистрации</a></div>
		<div><br><a target='_blanc'  class='iconfinder-icon' href='http://csp2.reduit-company.ru/tournament?tid=<?=$_GET["tid"]?>&show_table&toexcel'></a><br></div>
	</div>

<?

	

	echo "
		<table border=1 cellspacing=0 cellpadding=5>
			<thead>
				<tr>
					<th rowspan=2>№ п/п</th>
					<th rowspan=2>Наименование муниципального образования</th>";
			
				
			
				if( in_array(1, $tour_list_gender[$_GET["tid"]]) ) {
					echo "<th colspan=" . count($tour_list_years[$_GET["tid"]]) . ">Юноши</th>";
				}
				
				
				if( in_array(2, $tour_list_gender[$_GET["tid"]]) ) {
					echo "<th colspan=" . count($tour_list_years[$_GET["tid"]]) . ">Девушки</th>";
				}
					
					
					
				echo " 	<th rowspan=2>Всего участников</th>
				</tr>
				
				<tr> ";
				
				foreach($tour_list_years[$_GET["tid"]] as $year) :
					echo "	<th>" . $year . "</th>";
				endforeach;
				
				echo "	
				</tr>
			</thead>
			<tbody>
	";
	
	foreach($mo_list as $id => $title) {
		$row = $rs[$id];
		
		echo "<tr>";
		echo "<td>" . $i++ . "</td>";
		echo "<td><a href='/tournament?show_mo_stat=" . $id . "&tid=" . $_GET["tid"] . "'>" . $title . "</a></td>";
		
		$cnt = 0;
		
		foreach($tour_list_gender[$_GET["tid"]] as $genderindx) :		
			foreach($tour_list_years[$_GET["tid"]] as $year) :
				$cnt1 = count($rs[$_GET["tid"]][$id][$genderindx][$year]);
				$cnt = $cnt + $cnt1;
				echo "<td style='text-align: center " . (($cnt1 > 0) ? "; font-weight: bold" : "") . "'>" . $cnt1 . "</td>";
			endforeach;
		endforeach;

		
		echo "<td style='text-align: center " . (($cnt > 0) ? "; font-weight: bold" : "") . "'>" . $cnt . "</td>";
		
		echo "</tr>";
	
	}
	
	
	echo "</tbody></table>";
}
elseif(isset($_GET["tid"])) {
	
	
	if(isset($_POST["send_data"])) {
		$tour_id = $_POST["tour_id"];
		$reg_motrue_name = $_POST["reg_motrue_name"];
		$reg_mo_name = $_POST["reg_mo_name"];
		$reg_fio = $_POST["reg_fio"];
		$reg_gender = (int)$_POST["reg_gender"];
		$reg_birth_year = (int)$_POST["reg_birth_year"];
		$reg_gender_coach = (int)$_POST["reg_gender_coach"];
		$reg_birth_year_coach = (int)$_POST["reg_birth_year_coach"];
		$reg_type = (int)$_POST["reg_type"];
		

		$error = false;
		$success = false;

		if(empty($reg_mo_name)) {
			$error_text[] = 'Поле "Наименование муниципального учреждения" не может быть пустым.';
			$error = $error OR (empty($reg_mo_name));
		}

		if(empty($reg_fio)) {
			$error_text[] = 'Поле "Фамилия, Имя, Отчество участника/тренера" не может быть пустым.';
			$error = $error OR (empty($reg_fio));
		}

		if((($reg_gender < 1) OR ($reg_gender > 2))) {
			$error_text[] = 'Поле "Пол" указано не верно.';
			$error = $error OR ((($reg_gender < 1) OR ($reg_gender > 2)));
		}

		/*if((($reg_birth_year < 2004) OR ($reg_birth_year > 2007))) {
			$error_text[] = 'Поле "Год рождения" не может быть меньше 2004 или больше 2007.';
			$error = $error OR (empty($reg_mo_name));
		}*/

		if(!$error) {
			//DB
		
			$data = $db->executeAssoc("SELECT * FROM csp2_elreg");
			$items = array();
			
			while ($row = $data->FetchRow()) {
				$items[$row["id"]] = array(
					"id" => $row["id"],
					"tour_id" => $row["tour_id"],
					"reg_motrue_name" => $row["reg_motrue_name"],
					"reg_mo_name" => $row["reg_mo_name"],
					"reg_fio" => $row["reg_fio"],
					"reg_gender" => $row["reg_gender"],
					"reg_birth_year" => $row["reg_birth_year"],
					"reg_gender_coach" => $row["reg_gender_coach"],
					"reg_birth_year_coach" => $row["reg_birth_year_coach"],
					"reg_type" => $row["reg_type"],
				);
			}
			
			
			//$file=file_get_contents('regdata.txt');
			//$file = json_decode($file);
			
			foreach($items as $row) {
				$row = (object)$row;
				
				if($row->reg_fio == $reg_fio) {
					//$error = true;
					//$error_text[] = "Такой участник уже зарегистрирован.";
					//break;
				}
			}
			

			if(!$error) {
				$success = true;
				
				/*$file[] = array(
					"reg_motrue_name" => $tour_id,
					"reg_motrue_name" => $reg_motrue_name,
					"reg_mo_name" => $reg_mo_name,
					"reg_fio" => $reg_fio,
					"reg_gender" => $reg_gender,
					"reg_birth_year" => $reg_birth_year,
				);*/
				
				
				//FILE
				//$file = json_encode($file);
				//file_put_contents('regdata.txt', $file);
				
				//DB
				
				$object = array(
					"tour_id" => $tour_id,
					"reg_motrue_name" => $reg_motrue_name,
					"reg_mo_name" => $db->quote($reg_mo_name),
					"reg_fio" => $db->quote($reg_fio),
					"reg_gender" => $reg_gender,
					"reg_birth_year" => $reg_birth_year,
					"reg_gender_coach" => $reg_gender_coach,
					"reg_birth_year_coach" => $reg_birth_year_coach,
					"reg_type" => $reg_type,
					
				);

				$db->replace("csp2_elreg", $object, "id");

				//csp2_elreg
			}
		}
	}

	?>

	<h2 class="RCB">Электронная регистрация на соревнования<br>
	<?=$tour_list[$_GET["tid"]]?></h2>
	<div class="">
		<div><a href='/tournament'>Перейти к списку соревнований</a></div>
		<div><a href='/tournament?tid=<?=$_GET["tid"]?>&show_table'>Сводная таблица муниципальных образований</a></div>
	</div>

	
	<div id="form" class="formreg">
		<div class="row">
			<form method="post" action="/tournament?tid=<?=$_GET["tid"]?>">
				<h2>Регистрация</h2>
				<div>
				<?php
					if(count($error_text) > 0) {
						$error_text = implode(' ', $error_text);
						echo "<a style='color: red'>Ошибки: " . $error_text . "</a>";
					}
				?>
				<?php
					if($success) {
						echo "<a style='color: green'>Инфо: участник/тренер успешно зарегистрирован</a>";
					}
				?>
				</div>
				<div style="">
					<h3>Муниципальное образование</h3>
					<select  class="inp_text" name="reg_motrue_name">
					<?
						foreach($mo_list as $id => $title) {
					?>
						<option value="<?=$id?>"><?=$title?></option>
					<?
						}
					?>
					</select>					
				</div>
				
				<div style="">
					<h3>Наименование муниципального учреждения</h3>
					<input class="inp_text"  type="text" name="reg_mo_name" value="">
					<input class="inp_text"  type="hidden" name="tour_id" value="<?=$_GET["tid"]?>">
				</div>
				
				<div style="">
				<h3>ФИО участника/тренера</h3>
				<input class="inp_text" type="text" name="reg_fio" value="">
				</div>
				
				<div style="clear: both; float: none"></div>
				
				<div style="width: 150px; float: left; height: 40px;">
				<h3>Статус</h3>
				<select class="inp_text1" name="reg_type">
					<option value="1">участник</option>
					<option value="2">тренер</option>
				</select>
				</div>
				
				<div style="clear: both; float: none; height: 80px;"></div>
				
				<div><h3><u>Для участника</u></h3></div>
				
				<div style="width: 150px; float: left; height: 40px;">
				<h3>Пол</h3>
				<select class="inp_text1" name="reg_gender">
				<? foreach($tour_list_gender[$_GET["tid"]] as $genderindx): ?>
				<option value="<?=$genderindx?>"><?=$gender_list[$genderindx]?></option>
				<? endforeach; ?>
				</select>
				</div>
				
				
				
				<div style="width: 150px; float: left; height: 40px;">
				<h3>Год рождения</h3>
				<select class="inp_text1" name="reg_birth_year">
				<? foreach($tour_list_years[$_GET["tid"]] as $year): ?>
				<option value="<?=$year?>"><?=$year?></option>
				<? endforeach; ?>
				</select>
				
				</div>
				<div style="clear: both; float: none; height: 80px;"></div>
				
				<div><h3><u>Для тренера</u></h3></div>
				
				<div style="width: 150px; float: left; height: 120px;">
				<h3>Пол</h3>
				<select class="inp_text1" name="reg_gender_coach">
				<? foreach($gender_list as $genderindx => $gender_title): ?>
				<option value="<?=$genderindx?>"><?=$gender_title?></option>
				<? endforeach; ?>
				</select>
				</div>
				
				
				
				<div style="width: 150px; float: left; height: 120px;">
				<h3>Год рождения</h3>
				<select class="inp_text1" name="reg_birth_year_coach">
				<? 
					$list_years = array_reverse($list_years);
					foreach($list_years as $yearindex => $year): 
				?>
				<option value="<?=$year?>"><?=$year?></option>
				<? endforeach; ?>
				</select>
				
				</div>
				
				<div style="width: 150px; float: left; height: 100px;">
				<div style="">
				<input type="submit" value="отправить" name="send_data">
				<div><b>нажимая на кнопку, вы даете согласие на обработку своих персональных данных</b></div>
				</div>
			</form>
		</div>
		<div class="clear"></div>
	</div>	

	<?	
}
else {
	?>
<div class="sl">
	<section class="section">
		<h2 class="RCB h2">Электронная регистрация на соревнования</h2>
		<div class="n-wr">
			
		
			<? foreach($tour_list as $indx => $title ):?>
		
			<h3 class="RCB n-ttl"><a href="/tournament?tid=<?=$indx?>"><?=$title?></a></h3>
			
			<? endforeach; ?>
		</div>
	</section>
</div>
	<?
}

