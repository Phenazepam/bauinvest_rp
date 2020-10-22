<?php 
	use RedCore\Users\Collection as Users;


	Users::setObject("user");

	if((3 == Users::getAuthRole()) OR (4 == Users::getAuthRole())){
		require_once('form.director.php');
	}
	else{
		require_once('form.manager.php');
	}
?>


