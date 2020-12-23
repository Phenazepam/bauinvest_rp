<?php

use \RedCore\BankEscrow\Collection as BankEscrow;
use \RedCore\Where as Where;
use \RedCore\Session as Session;
use \RedCore\Expenditure\Collection as Expenditure;
use RedCore\Request as Request;



Session::bind("liter_id", "filter_liter_id", -1);
// $pid = 0;
if(null !== Request::vars("pid")){
    $pid = Request::vars("pid");
}

BankEscrow::setObject("bankescrow");

$liter_id = Session::get("filter_liter_id");

$where = Where::Cond()
  ->add("_deleted", "=", "0")
  ->add("and")
  ->add("liter_id", "=", $liter_id)
  ->parse();

$items = BankEscrow::getList($where);


?>