<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\Users;

use \RedCore\Logger\Collection as Logger;
use \RedCore\Users\Collection as Users;
use \RedCore\Controller as Controller;
use \RedCore\Core as Core;
use \RedCore\Where as Where;
use RedCore\Session;

require_once('sql.php');
require_once('object.php');

class Collection extends \RedCore\Base\Collection { 
	
	public static $roles = array(
		"0" => "Не выбрана",
		
	    "1" => "Гость",
		"2" => "Менеджер",
	    "3" => "Контроллер",
	    "4" => "Руководитель",
	);
	
	/**
	 * @method \RedCore\Base\Collection setObject()
	 */
	public static function setObject($obj = "user") {
		if("user" == $obj) {
			self::$object = "user";
			self::$sql    = Sql::$sqlUsers;
			self::$class  = "RedCore\Users\ObjectBase";
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
	
	/**
	 * @method \RedCore\Base\Collection Auth()
	 */
	public static function Auth($params = array()) {
	    $obj = self::$object;
	    
	    $lb_params = array(
	        "login"    => $params[$obj]["login"],
	        "password" => $params[$obj]["password"],
	    );
	    
	    if($$obj = self::loadBy($lb_params)) {
	        $$obj->object->device_key = get_ip();
	        $$obj->object->token_key = md5($$obj->object->login . $$obj->object->password . $$obj->object->device_key);
	        $$obj->store();
	        Session::set("controller_user_auth", $$obj->object->token_key);
	        
	        Logger::registerEvent("SECURITY", "Auth", "successful", $$obj->object->id);
	    }
	    else {
	        Logger::registerEvent("SECURITY", "Auth", "unsuccessful: wrong login or password", $$obj->object->id);
	        
	        Session::delete("controller_user_auth");
	        return false;
	    }
	}
	
	public static function Logout() {
	    Logger::registerEvent("SECURITY", "Logout", "successful", self::getAuthId());
	    
	    Session::delete("controller_user_auth");
	    Controller::Redirect("/");
	}
	
	public static function isAuth() {
	    $obj = self::$object;
	    
	    if($token_key = Session::get("controller_user_auth")) {
	        $lb_params = array(
	            "token_key" => $token_key,
	        );
	        
	        if($$obj = self::loadBy($lb_params)) {
	            return true;
	        }
	    }
	    
	    return false;
	}
	
	public static function getAuthToken() {
	    if($token_key = Session::get("controller_user_auth")) {
	        return $token_key;
	    }
	    
	    return false;
	}
	
	public static function getAuthRole() {
	    $obj = self::$object;
	    
	    if($token_key = Session::get("controller_user_auth")) {
	        $lb_params = array(
	            "token_key" => $token_key,
	        );
	        
	        if($$obj = self::loadBy($lb_params)) {
	            return $$obj->object->role;
	        }
	    }
	    
	    return false;
	}
	
	public static function getAuthId() {
	    $obj = self::$object;
	    
	    if($token_key = Session::get("controller_user_auth")) {
	        $lb_params = array(
	            "token_key" => $token_key,
	        );
	        
	        if($$obj = self::loadBy($lb_params)) {
	            return $$obj->object->id;
	        }
	    }
	    
	    return false;
	}
	
	public static function getRolesList() {
	    return self::$roles;
	}
	
	public static function getRoleById($id = 0) {
	    return self::$roles[$id];
	}
	
	public static function getSexList() {
	    return self::$sex;
	}
	
	public static function getRegionList() {
	    return self::$region;
	}
	
	public static function getCityList() {
	    return self::$city;
	}
	
	public function generateTokenKey($string = "") {
	    return md5($string);
	}
}

?>
