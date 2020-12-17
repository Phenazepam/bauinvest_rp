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
				budget,
				paid,
				rest,
                _deleted
			FROM
				bauinvest__bankescrow
		';
	

}