<?php
//"https://ent.kubstu.ru/?mode=0&psm=0&pvmd=1&rank=1"; список спкециальностей

	$base_url = '/kubsau.dump.php';
	$vuz_url = 'https://kubsau.ru/entrant/spiski-postupayushchikh/';
	$vuz_url1 = 'https://kubsau.ru/';

	$specs = file_get_contents('https://kubsau.ru/entrant/spiski-postupayushchikh/');
	echo  $specs;

	preg_match_all("/upload\/slpd\/comp_lists\/main\/.*?.html/", $specs, $urls);

	
	foreach($urls[0] as $url) {
		$data = file_get_contents($vuz_url1 . $url);
		
		$spec = $data;
		$spec = explode('<TD CLASS="R11C0" COLSPAN=11>', $spec);
		$spec = explode('</TD>', $spec[1]);
		$specO = $spec[0];
		echo $specO;
		
		$persons = array();
		print_r($spec[1]);
		$tr_s = explode("<tr", $spec[1]);
		
		foreach($tr_s as $tr) {
			$data = explode(">", $tr);
				
			foreach($data as $item) {
				echo $item."<br>";
				$item = strip_tags($item);
				echo $item."<br>";
			}
			
		}
		
		
		
		break;
	}
		
	/*

	$c_hid = $_REQUEST["hid"];
	$c_fid = $_REQUEST["fid"];
	$c_id = $_REQUEST["id"];

	$stop = false;
	$countids = 0;
	
	foreach($ids as $id) {
		$countids++;
		
		if(empty($c_id)) {
			$url_refresh = $base_url . "/?id=" . $id["id"];
			break;
		}
		
		elseif($stop) {
			if($id["id"] == $c_id) {
				$url_refresh = false;
			}
			else {
				$url_refresh = $base_url . "/?id=" . $id["id"];
			}
			break;
		}
		
		elseif($c_id == $id["id"]) {
	
			$stop = true;
			
			$url = $vuz_url . "?fid=" . $id["fid"] . "&hid="  . $id["hid"] . "&id=" . $id["id"] . "&mode=0&psm=0&pvmd=1&rank=1";
			//echo $url;
			$json = file_get_contents($url);
			$data = json_decode($json);
			$persons = array();
			
			$file = file_get_contents("kubgtu.txt");
			$file = unserialize($file);
			
			$data = (array)$data;
			
			foreach($data["roll"] as $item) {
				//print_r($item);
				if(12 == count($item)) {
					$persons[] = array(
						"hid" => $id["hid"],
						"fid" => $id["fid"],
						"fio"    => $item[1],
						"sh_ld"  => $item[2],
						"sum"    => $item[3],
						"orig"   => $item[9],
						"accept" => $item[10],
					);
				}
			}
			//print_r($persons);
			if(!is_array($file)) {
				$file = array();
			}
			$file = array_merge($file, $persons);
			//print_r($persons);
			$file = serialize($file);
			
			file_put_contents("kubgtu.txt", $file);
			
		}
	}
	*/
	
?>

<html>
	<head>
		<? /*if ($url_refresh) {?><META HTTP-EQUIV="REFRESH" CONTENT="5;URL=<?=$url_refresh?>"><?}*/ ?>
		<meta charset="utf-8">
	</head>
<body>
КубГТУ: загрузка <?=$countids?> из <?=count($ids)?><br>
<a href="<?=$url_refresh?>">обновить</a>

</body>
</html>