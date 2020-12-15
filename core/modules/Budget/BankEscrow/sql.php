<?php

/**
 * @copyright 2017
 * @author Darkas
 * @copyright REDUIT Co.
 */

namespace RedCore\BankEscrow;

class Sql {
	public static 
	   $sqlBankEscrow = '
			SELECT
				id,
				liter_id,
				expenditure_id,
				params,
                _deleted
			FROM
				bauinvest__bankescrow
		';
	

}