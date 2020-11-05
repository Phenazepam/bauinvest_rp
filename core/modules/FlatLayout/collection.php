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

	public static function store() {
		
		$allowed_filetypes = array(
			'png',
			'jpeg',
			'jpg'
        );
		# Допустимый размер загружаемого файла
        $max_filesize = 1382288;
        
        # Директория для загрузки
		$upload_path = '../images/flat_plans/';
		
		# Получаем данные из формы
        $file = $_FILES['flatlayout'];      
		//var_dump($file);
        # Получаем расширение файла
        $extension = pathinfo( $file['name'], PATHINFO_EXTENSION );

        # Формируем имя файла
		$filename = $file['name'];

        if( $file['error'] ){
			header("Location: /flatlayout-list");
  			exit();
        }
        elseif(!in_array($extension, $allowed_filetypes)){
			header("Location: /flatlayout-list");
  			exit();
        }
        elseif( $file['tmp_name'] > $max_filesize){
			header("Location: /flatlayout-list");
  			exit();
		}
		else{
			move_uploaded_file($file['tmp_name'], $upload_path . $filename);
			header("Location: /flatlayout-list");
  			exit();
		}
	}

	public static function delete($params = null){
		//var_dump($params);
		$current_dir = '../images/flat_plans/';
		$purpose_dir = '../images/flat_plans_deleted/';
		$file = $current_dir . $params["flatlayout"]["name"];
		var_dump($file);
		$new_name = $purpose_dir . $params["flatlayout"]["name"];
		if (rename($file, $new_name)) {
			echo "Файл успешно перемещен!";
		}else{
			echo "Файл не удалось переместить!";
		}
	}

	public static function getListImages() {
		$images = array_diff(scandir("../images/flat_plans"), array('..', '.'));
	    return $images;
	}

	public static function uploadNewLayout($params){
		echo 123;
		var_dump($params);
		exit();
	}

}

?>
