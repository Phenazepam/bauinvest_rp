<?php 
namespace RedCore\Flats;
use RedCore\FlatLayout\Collection as Layout;

class FlatImages{

	public static function CreateImgDiv($id_b){
		$out = '<div class="row">';
		$images = Layout::getListImages($id_b);
		$dir="/images/flat_plans/".$id_b.'/';
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

