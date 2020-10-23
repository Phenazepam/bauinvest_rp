
<div class="row">
<?php
	$images = array_diff(scandir("../images/flat_plans"), array('..', '.'));
	$dir="/images/flat_plans/";
	foreach($images as $img):
?>

	<div class="col" style="border: 2px solid black;">
		<input type="radio" name="img" $value="<?=$img?>"> <img src="<?=$dir.$img?>" width="200" height="200" alt="">
	</div>
<?php 
endforeach
?>
</div>