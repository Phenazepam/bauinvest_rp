<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\FlatLayout;

use \RedCore\Logger\Collection as Logger;
use \RedCore\saletype\Collection as saletype;
use \RedCore\Controller as Controller;
use \RedCore\Core as Core;
use \RedCore\Where as Where;
use RedCore\Session;
use \RedCore\Files as Files;

//require_once('sql.php');
//require_once('object.php');

class Collection extends \RedCore\Base\Collection { 
	
	
	/**
	 * @method \RedCore\Base\Collection setObject()
	 */
	public static function setObject($obj = "flatLayout") {
		if("flatLayout" == $obj) {
			self::$object = "flatLayout";
			//self::$sql    = Sql::$sqlsaletype;
			self::$class  = "RedCore\FlatLayout\ObjectBase";
		}
	}
	
	/**
	 * @method \RedCore\Base\Collection loadBy()
	 *
	 * @return \RedCore\Users\ObjectBase Object
	 */
	public static function loadBy($params = array()) {
	    return parent::loadBy($params);
	}
	
	/**
	 * @method \RedCore\Base\Collection loadBy()
	 *
	 * @return \RedCore\Users\ObjectBase Object
	 */
	public static function getList($where = "") {
	    return parent::getList($where);
	}

	public static function store()
	{
		if (isset($_FILES['flatlayout'])) {
			$id_b = Session::get("filter_building_id");
			$dir_prefix = '';
			if (is_dir('../images/flat_plans/' . $id_b)) {
				$dir_prefix = $id_b;
			} else {
				mkdir('../images/flat_plans/' . $id_b, 0777, true);
				$dir_prefix = $id_b;
			}



			$allowed_filetypes = array(
				'png',
				'jpeg',
				'jpg'
			);
			# Допустимый размер загружаемого файла
			$max_filesize = 1382288;
			$quality = 60;
			# Директория для загрузки
			$upload_path = '../images/flat_plans/' . $dir_prefix . '/';

			# Получаем данные из формы
			$file = $_FILES['flatlayout'];
			//var_dump($file);
			# Получаем расширение файла
			$extension = pathinfo($file['name'], PATHINFO_EXTENSION);

			# Формируем имя файла
			$filename = $dir_prefix.'_'.Collection::getRandomFileName($upload_path, $extension);

			if ($file['error']) {
				header("Location: /flatlayout-list");
				exit();
			} elseif (!in_array($extension, $allowed_filetypes)) {
				header("Location: /flatlayout-list");
				exit();
			} elseif ($file['tmp_name'] > $max_filesize) {
				header("Location: /flatlayout-list");
				exit();
			} else {
				switch ($file['type']) {
					case 'image/jpeg':
					case 'image/pjpeg':
						$source = imagecreatefromjpeg($file['tmp_name']);
						//imagejpeg($source, $upload_path.$filename, $quality); //Сохраняем созданное изображение по указанному пути в формате jpg

						break;

					case 'image/png':
						$source = imagecreatefrompng($file['tmp_name']);
						//imagepng($source, $upload_path.$filename, 9);
						break;
				}
				imagejpeg($source, $upload_path . $filename . '.jpg', $quality); //Сохраняем созданное изображение по указанному пути в формате jpg

				imagedestroy($source); //Чистим память
				header("Location: /flatlayout-list");
				exit();
			}
		}
	}

	public static function delete($params = null){
		//var_dump($params);
		$current_dir = '../images/flat_plans/'.$params["flatlayout"]["id_b"].'/';
		$purpose_dir = '../images/flat_plans_deleted/';
		$file = $current_dir . $params["flatlayout"]["name"];
		//var_dump($file);
		$new_name = $purpose_dir . $params["flatlayout"]["name"];
		rename($file, $new_name);
	}

	public static function getListImages($id_b) {
		$images = array_diff(scandir("../images/flat_plans/".$id_b.'/'), array('..', '.'));
	    return $images;
	}

	public static function getRandomFileName($path, $extension='')
    {
        $extension = $extension ? '.' . $extension : '';
        $path = $path ? $path . '/' : '';
 
        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $path . $name . $extension;
        } while (file_exists($file));
 
        return $name;
    }

}

?>
