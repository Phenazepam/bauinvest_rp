<?php

	$chess_list = array(
		"2" => array(
			"1" => array(
				"rooms"     => "3",
				"number"    => "8",
				"costpersq" => "47477",
				"square"    => "110",
				"status"    => "blue",
				"floor"     => "2",
			),
			"2" => array(
				"rooms"     => "2",
				"number"    => "7",
				"costpersq" => "47477",
				"square"    => "63",
				"status"    => "green",
				"floor"     => "2",
			),
			"3" => array(
				"rooms"     => "2",
				"number"    => "6",
				"costpersq" => "47477",
				"square"    => "66",
				"status"    => "grey",
				"floor"     => "2",
			),
			"4" => array(
				"rooms"     => "3",
				"number"    => "5",
				"costpersq" => "47477",
				"square"    => "115",
				"status"    => "green",
				"floor"     => "2",
			),
		),
		
		"1" => array(
			"1" => array(
				"rooms"     => "2",
				"number"    => "4",
				"costpersq" => "47477",
				"square"    => "60",
				"status"    => "green",
				"floor"     => "1",
			),
			"2" => array(
				"rooms"     => "2",
				"number"    => "3",
				"costpersq" => "47477",
				"square"    => "61",
				"status"    => "green",
				"floor"     => "1",
			),
			"3" => array(
				"rooms"     => "3",
				"number"    => "2",
				"costpersq" => "47477",
				"square"    => "120",
				"status"    => "green",
				"floor"     => "1",
			),
			"4" => array(
				"rooms"     => "3",
				"number"    => "1",
				"costpersq" => "47477",
				"square"    => "125",
				"status"    => "green",
				"floor"     => "1",
			),
		)
	);

?>


<div class="row">

	<?
		foreach($chess_list as $indx => $floor):
	?>
	<div class="row">
		<div class="col-md-2">
			<h1>Этаж <?=$indx?></h2>
		</div>
		<div class="col-md-10">
		
		
	<?
			foreach($floor as $item):
	?>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-3 <?=$item["status"]?>">
			<div class="tile-stats" style="padding: 5px">
					<h4><?=number_format(($item["costpersq"]*$item["square"]), 0, ',', ' ')?> <i class="fa fa-rub"></i></h4>
					<h6><span class="badge badge-secondary"><?=$item["rooms"]?> к.кв.</span>&nbsp;&nbsp;&nbsp;&nbsp;№<?=$item["number"]?> - <?=number_format($item["costpersq"], 0, ',', ' ')?> р/кв<sup>2</sup></h6>
			</div>
		</div>
	<?
			endforeach;
	?>
		</div>
	</div>
	<?
		endforeach;
	?>
  
  
  
</div>

