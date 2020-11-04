<?php 
namespace RedCore\Flats;

class FlatImages{

	public static function CreateImgDiv(){
		$out = '<div class="row">';
		$images = array_diff(scandir("../images/flat_plans"), array('..', '.'));
		$dir="/images/flat_plans/";
		foreach($images as $img){
			$out.= '<div class="col" style="border: 2px solid black;">
						<input type="radio" name="flat[params][img]" class="form-control" id="img" value="'.$img.'" required> <img src="'.$dir.$img.'" width="150" height="200" alt="">
					</div>';


		}
		$out.='</div>';
		return $out;
	}

}
?>

