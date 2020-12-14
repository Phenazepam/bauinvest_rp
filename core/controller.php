<?php
/**
 * @copyright 2016
 * @author Darkas
 * @copyright REDUIT Co.
 */
//test 
namespace RedCore;

use RedCore\Users\Collection as Users;
use RedCore\Request as Request;
use RedCore\Session as Session;
use RedCore\Config as Config;

class Controller {
	
	private static $url    = "";
	private static $page   = "";
	private static $action = "";
	
	private static $route = array(
		/*	ROUTE PAGES
		 * 
		 *	KEYS:
		 *		"title"  : title for main use. Values: string
		 *		"url"    : url for access in browser. Values: string
		 *		"view"   : path to php in views. Values: string
		 *		"content": path to php subview, if view used as template. Values: string
		 *		"tag"    : tags array. Values: mixed array
		 *		"default": default page. Values: "true", "false"
		 *
		 *	@TODO pages set and load in BD
		 */	
		"pages" => array(	
			/* AJAX
			 * 
			 * Not used: content, tags, default
			 * Example:
			 * 
			  	array(
					"title"    => "test",
					"url"      => "test",
					"view"     => "test/test/test.php",
					"content"  => "",
					"tag"      => array(),
				),
			 */ 
				
				
			/* DESKTOP
			 *
			 * Example:
			 *
				 array(
					 "title"    => "test",
					 "url"      => "test",
					 "view"     => "test/test/test.php",
					 "content"  => "test/test/subtest.php",
					 "tag"      => array("top"),
					 "default"  => true
				 ),
			 */
			array(
				"title"    => "Авторизация",
				"url"      => "auth",
				"view"     => "desktop/users/auth.php",
				"content"  => "desktop/users/auth.php",
				"tag"      => array(),
			    "auth"     => true,
			),
			
		    array(
		        "title"    => "Главная",
		        "url"      => "home",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/dashboard/home.php",
		        "tag"      => array("top"),
		        "default"  => true,
		        "access"   => array(
		            "role" => array(1, 2, 3, 4),
		        )
		    ),
		    
			/*
			 ______________________________________________________________________________________________________________________________________________________
			 * Реестры 
			 ______________________________________________________________________________________________________________________________________________________
			 */
			
			 
			// Пользователи
		    array(
		        "title"    => "Пользователи",
		        "url"      => "users-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/users/list.php",
		        "tag"      => array("top", "reestr"),
		        "default"  => false,
		    ),
		    
		    array(
		        "title"    => "Форма - Пользователи",
		        "url"      => "users-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/users/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
		    ),
			//Реестр договоров
			array(
		        "title"    => "Реестр договоров",
		        "url"      => "contract-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/contract/list.php",
		        "tag"      => array("top", "reestr"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Форма договоры",
		        "url"      => "contract-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/contract/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),

		    array(
		        "title"    => "Форма - Форма просмотр договоров",
		        "url"      => "contract-form-view",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/contract/form-view.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			// Контрагенты
		    array(
		        "title"    => "Реестр контрагентов",
		        "url"      => "partner-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/partner/list.php",
		        "tag"      => array("top", "reestr"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Контрагенты",
		        "url"      => "partner-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/partner/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			/* //temp
			array(
		        "title"    => "Реестр объектов продажи",
		        "url"      => "saleobject-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/saleobject/list.php",
		        "tag"      => array("top", "reestr"),
		        "default"  => false,
		    ), */

			//Справочник объектов продажи
			array(
		        "title"    => "Реестр объектов продажи",
		        "url"      => "buildings-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Buildings/list.php",
		        "tag"      => array("top", "reestr"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    array(
		        "title"    => "Форма - Объекты продажи",
		        "url"      => "buildings-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Buildings/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			array(
		        "title"    => "Квартиры",
		        "url"      => "flats-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Flats/list.php",
		        "tag"      => array(),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    array(
		        "title"    => "Форма - Объекты продажи",
		        "url"      => "flats-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Flats/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),

			/* array(
		        "title"    => "Реестр объектов продажи",
		        "url"      => "saleobject-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/saleobject/list.php",
		        "tag"      => array("top", "reestr"),
		        "default"  => false,
		    ),
		    
		    array(
		        "title"    => "Форма - Объекты продажи",
		        "url"      => "saleobject-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/saleobject/form.php",
		        "tag"      => array(),
			), */

			//Справочник видов отделки
			array(
		        "title"    => "Справочник видов отделки",
		        "url"      => "facingtype-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/facingtypes/list.php",
		        "tag"      => array("top", "sprav"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Виды отделки",
		        "url"      => "facingtype-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/facingtypes/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
			),

			//Справочник типов договора
			array(
		        "title"    => "Справочник типов договора",
		        "url"      => "contracttype-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/contracttypes/list.php",
		        "tag"      => array("top", "sprav"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Типы договора",
		        "url"      => "contracttype-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/contracttypes/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
			),

			//Справочник субъектов учета
			array(
		        "title"    => "Справочник субъектов учета",
		        "url"      => "accountingentity-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/accountingentity/list.php",
		        "tag"      => array("top", "sprav"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Субъекты учета",
		        "url"      => "accountingentity-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/accountingentity/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
			),

			//Справочник статусов договора
			array(
		        "title"    => "Справочник статусов договора",
		        "url"      => "contractstatus-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/contractstatus/list.php",
		        "tag"      => array("top", "sprav"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Статусы договоров",
		        "url"      => "contractstatus-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/contractstatus/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
			),

			//Справочник акций
			array(
		        "title"    => "Реестр акций",
		        "url"      => "promotion-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/promotion/list.php",
		        "tag"      => array("top", "reestr"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Акции",
		        "url"      => "promotion-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/promotion/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			//Справочник агентства
			array(
		        "title"    => "Реестр агентств недвижимости",
		        "url"      => "agency-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/agency/list.php",
		        "tag"      => array("top", "reestr"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Агенства недвижимости",
		        "url"      => "agency-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/agency/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			//Справочник форм расчета
			array(
		        "title"    => "Справочник форм расчета",
		        "url"      => "calculationform-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/calculationform/list.php",
		        "tag"      => array("top", "sprav"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Формы расчета",
		        "url"      => "calculationform-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/calculationform/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
			),
			//Справочник типов продажи
			array(
		        "title"    => "Справочник типов продажи",
		        "url"      => "saletype-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/saletype/list.php",
		        "tag"      => array("top", "sprav"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Типы продажи",
		        "url"      => "saletype-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/saletype/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
			),
			//Справочник статусов объектов
			array(
		        "title"    => "Справочник статусов объектов",
		        "url"      => "objectstatus-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/ObjectStatus/list.php",
		        "tag"      => array("top", "sprav"),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Типы продажи",
		        "url"      => "objectstatus-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/ObjectStatus/form.php",
				"tag"      => array(),
				"access"   => array(
		            "role" => array(3, 4),
		        ),
			),


			//Справочник ипотечных банков
			array(
		        "title"    => "Реестр ипотечных банков",
		        "url"      => "mortgagebank-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/mortgagebank/list.php",
		        "tag"      => array("top", "reestr"),
		        "default"  => false,"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Ипотечные банки",
		        "url"      => "mortgagebank-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/mortgagebank/form.php",
		        "tag"      => array(),"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),

			// Справочник планировок квартир
			array(
		        "title"    => "Справочник планировок квартир",
		        "url"      => "flatlayout-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/FlatLayout/list.php",
		        "tag"      => array("top", ""),
				"default"  => false,
				"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			

		    //Справочник статей расхода первый уровень
			array(
		        "title"    => "Справочник статей расхода",
		        "url"      => "expenditurefirst-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Expenditure/ExpenditureFirst/list.php",
		        "tag"      => array("top", "sprav"),
		        "default"  => false,"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Статьи расходов Первый уровень",
		        "url"      => "expenditurefirst-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Expenditure/ExpenditureFirst/form.php",
		        "tag"      => array(),"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			//Справочник статей расхода второй уровень
			array(
		        "title"    => "Справочник статей расхода",
		        "url"      => "expendituresecond-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Expenditure/ExpenditureSecond/list.php",
		        "tag"      => array("top", ""),
		        "default"  => false,"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Статьи расходов Первый уровень",
		        "url"      => "expendituresecond-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Expenditure/ExpenditureSecond/form.php",
		        "tag"      => array(),"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			//Справочник статей расхода третий уровень
			array(
		        "title"    => "Справочник статей расхода",
		        "url"      => "expenditurethird-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Expenditure/ExpenditureThird/list.php",
		        "tag"      => array("top", ""),
		        "default"  => false,"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Статьи расходов Первый уровень",
		        "url"      => "expenditurethird-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Expenditure/ExpenditureThird/form.php",
		        "tag"      => array(),"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),


			
			//-----------------------------------------------------------------------------------------------
			// Бухгалтерия
			//-----------------------------------------------------------------------------------------------
			array(
		        "title"    => "Бюджет банка на Эскроу",
		        "url"      => "bankescrow-list",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Budget/BankEscrow/list.php",
		        // "content"  => "desktop/Budget/ExpenditureTree/DrawExpenditureTree.php",
		        "tag"      => array("top", "bookkeeping"),
		        "default"  => false,"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    array(
		        "title"    => "Форма - Статьи расходов Первый уровень",
		        "url"      => "expenditurethird-form",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/Expenditure/ExpenditureThird/form.php",
		        "tag"      => array(),"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
			),
			
			array(
		        "title"    => "Бюджет",
		        "url"      => "expendituretree",
		        "view"     => "desktop/empty.php",
		        // "content"  => "desktop/Budget/BankEscrow/list.php",
		        "content"  => "desktop/Budget/ExpenditureTree/DrawExpenditureTree.php",
		        "tag"      => array("top", ""),
		        "default"  => false,"access"   => array(
		            "role" => array(2, 3, 4),
		        ),
		    ),
		    
		    
		    /*______________________________________________________________________________________________________________________________________________________
		     * Мониторинг
			 * ______________________________________________________________________________________________________________________________________________________
		     */
		    array(
		        "title"    => "Мониторинг",
		        "url"      => "monitoring",
		        "view"     => "desktop/page.php",
		        "content"  => "desktop/dashboard/monitoring.php",
		        "tag"      => array("top"),
		        "default"  => false,
		    ),
		    
			array(
				"title"    => "Мониторинг",
				"url"      => "indicators",
				"view"     => "desktop/page.php",
				"content"  => "desktop/dashboard/indicators.php",
				"tag"      => array("top"),
				"default"  => false,
			),
			array(
				"title"    => "Шахматка",
				"url"      => "chess",
				"view"     => "desktop/page.php",
				"content"  => "desktop/dashboard/chess.php",
				"tag"      => array("top"),
				"default"  => false,
			),
		    
		    
		    
			/*array(
				"title"    => "Агенты",
				"url"      => "agents-list",
				"view"     => "desktop/page.php",
				"content"  => "desktop/agents/list.php",
				"tag"      => array("top"),
			),
			array(
				"title"    => "Форма - Агенты",
				"url"      => "agents-form",
				"view"     => "desktop/page.php",
				"content"  => "desktop/agents/form.php",
				"tag"      => array(),
			),
			array(
				"title"    => "Контракты",
				"url"      => "contracts-list",
				"view"     => "desktop/page.php",
				"content"  => "desktop/contracts/list.php",
				"tag"      => array("top"),
			),
			array(
				"title"    => "Форма - Контракты",
				"url"      => "contracts-form",
				"view"     => "desktop/page.php",
				"content"  => "desktop/contracts/form.php",
				"tag"      => array(),
			),
			array(
				"title"    => "Документы",
				"url"      => "documents-list",
				"view"     => "desktop/page.php",
				"content"  => "desktop/documents/list.php",
				"tag"      => array("top"),
			),
			array(
				"title"    => "Форма - Документы",
				"url"      => "documents-form",
				"view"     => "desktop/page.php",
				"content"  => "desktop/documents/form.php",
				"tag"      => array(),
			),
			array(
				"title"    => "Печать счета",
				"url"      => "print-bill",
				"view"     => "desktop/documents/bill.php",
				"content"  => "",
				"tag"      => array(),
			),
			array(
				"title"    => "Печать акта",
				"url"      => "print-act",
				"view"     => "desktop/documents/act.php",
				"content"  => "",
				"tag"      => array(),
			),
			array(
				"title"    => "Печать счета и акта",
				"url"      => "print-billact",
				"view"     => "desktop/documents/billact.php",
				"content"  => "",
				"tag"      => array(),
			),
			array(
				"title"    => "Оплата документа",
				"url"      => "set-document-paid",
				"view"     => "desktop/documents/set-document-paid.php",
				"content"  => "",
				"tag"      => array(),
			),*/
		    
        	/**
        	 * INSTALL
        	 */
		    array(
		        "title"    => "Настройка",
		        "url"      => "install",
		        "view"     => "system/install.php",
		        "content"  => "",
		        "tag"      => array(),
		    ),
		    
		    /**
		     * 404
		     */
		    array(
		        "title"    => "Ошибка доступа",
		        "url"      => "error404",
		        "view"     => "system/page404.php",
		        "content"  => "",
		        "tag"      => array(),
			),
			
			/**
		     * 403
		     */
		    array(
		        "title"    => "Доступ запрещен",
		        "url"      => "error403",
		        "view"     => "desktop/page.php",
		        "content"  => "system/page403.php",
		        "tag"      => array(),
		    ),
		),
		/*	______________________________________________________________________________________________________________________________________________________
		 *	ROUTE ACTIONS
		 *
		 *	KEYS:
		 *		"name"  : action unique name for using in frontend forms. Values: string
		 *		"module": real module object full path. Values: string
		 *		"method": real method of "module". Values: string
		 *		"params": list of params to transfer from $_REQUEST in "method". Values: string
		 *
		 *	@TODO actions set and load in BD
		 *  ______________________________________________________________________________________________________________________________________________________
		 */
		"actions" => array(
			/* AJAX
			 *
			 * Not used: content, tags, default
			 * Example:
			 *
				array(
					"name"   => "test.test.do",
					"module" => "RedCore\Test\Collection",
					"method" => "store",
					"params" => array(
						"test",
					),
				),
			 */
		    // User actions
		    array(
		        "name"   => "user.store.do",
		        "module" => "RedCore\Users\Collection",
		        "method" => "store",
		        "params" => array(
		            "user",
		        ),
		    ),
		    
		    array(
		        "name"   => "user.delete.do",
		        "module" => "RedCore\Users\Collection",
		        "method" => "delete",
		        "params" => array(
		            "user",
		        ),
			),
			

		    //Partner actions
		    array(
		        "name"   => "partner.store.do",
		        "module" => "RedCore\partner\Collection",
		        "method" => "store",
		        "params" => array(
		            "partner",
		        ),
		    ),
		    
		    array(
		        "name"   => "partner.delete.do",
		        "module" => "RedCore\partner\Collection",
		        "method" => "delete",
		        "params" => array(
		            "partner",
		        ),
			),
			

			//FacingType actions
			array(
		        "name"   => "facingtype.store.do",
		        "module" => "RedCore\Facingtypes\Collection",
		        "method" => "store",
		        "params" => array(
		            "facingtype",
		        ),
		    ),
		    
		    array(
		        "name"   => "facingtype.delete.do",
		        "module" => "RedCore\Facingtypes\Collection",
		        "method" => "delete",
		        "params" => array(
		            "facingtype",
		        ),
			),

			//ContractType actions
			array(
		        "name"   => "contracttype.store.do",
		        "module" => "RedCore\Contracttypes\Collection",
		        "method" => "store",
		        "params" => array(
		            "contracttype",
		        ),
		    ),
		    
		    array(
		        "name"   => "contracttype.delete.do",
		        "module" => "RedCore\Contracttypes\Collection",
		        "method" => "delete",
		        "params" => array(
		            "contracttype",
		        ),
			),

			//accountingentity
			array(
		        "name"   => "accountingentity.store.do",
		        "module" => "RedCore\accountingentity\Collection",
		        "method" => "store",
		        "params" => array(
		            "accountingentity",
		        ),
		    ),
		    
		    array(
		        "name"   => "accountingentity.delete.do",
		        "module" => "RedCore\accountingentity\Collection",
		        "method" => "delete",
		        "params" => array(
		            "accountingentity",
		        ),
			),
			//contractstatus
			array(
		        "name"   => "contractstatus.store.do",
		        "module" => "RedCore\contractstatus\Collection",
		        "method" => "store",
		        "params" => array(
		            "contractstatus",
		        ),
		    ),
		    
		    array(
		        "name"   => "contractstatus.delete.do",
		        "module" => "RedCore\contractstatus\Collection",
		        "method" => "delete",
		        "params" => array(
		            "contractstatus",
		        ),
			),

			//promotion
			array(
		        "name"   => "promotion.store.do",
		        "module" => "RedCore\promotion\Collection",
		        "method" => "store",
		        "params" => array(
		            "promotion",
		        ),
		    ),
		    
		    array(
		        "name"   => "promotion.delete.do",
		        "module" => "RedCore\promotion\Collection",
		        "method" => "delete",
		        "params" => array(
		            "promotion",
		        ),
			),
			//agency
			array(
		        "name"   => "agency.store.do",
		        "module" => "RedCore\agency\Collection",
		        "method" => "store",
		        "params" => array(
		            "agency",
		        ),
		    ),
		    
		    array(
		        "name"   => "agency.delete.do",
		        "module" => "RedCore\agency\Collection",
		        "method" => "delete",
		        "params" => array(
		            "agency",
		        ),
			),

			//calculationform
		    array(
		        "name"   => "calculationform.store.do",
		        "module" => "RedCore\calculationform\Collection",
		        "method" => "store",
		        "params" => array(
		            "calculationform",
		        ),
		    ),
		    
		    array(
		        "name"   => "calculationform.delete.do",
		        "module" => "RedCore\calculationform\Collection",
		        "method" => "delete",
		        "params" => array(
		            "calculationform",
		        ),
			),
			//saletype
			array(
		        "name"   => "saletype.store.do",
		        "module" => "RedCore\saletype\Collection",
		        "method" => "store",
		        "params" => array(
		            "saletype",
		        ),
		    ),
		    
		    array(
		        "name"   => "saletype.delete.do",
		        "module" => "RedCore\saletype\Collection",
		        "method" => "delete",
		        "params" => array(
		            "saletype",
		        ),
			),
			//mortgagebank
			array(
		        "name"   => "mortgagebank.store.do",
		        "module" => "RedCore\mortgagebank\Collection",
		        "method" => "store",
		        "params" => array(
		            "mortgagebank",
		        ),
		    ),
		    
		    array(
		        "name"   => "mortgagebank.delete.do",
		        "module" => "RedCore\mortgagebank\Collection",
		        "method" => "delete",
		        "params" => array(
		            "mortgagebank",
		        ),
			),
			//saleobject
			array(
		        "name"   => "saleobject.store.do",
		        "module" => "RedCore\saleobject\Collection",
		        "method" => "store",
		        "params" => array(
		            "saleobject",
		        ),
		    ),
		    
		    array(
		        "name"   => "saleobject.delete.do",
		        "module" => "RedCore\saleobject\Collection",
		        "method" => "delete",
		        "params" => array(
		            "saleobject",
		        ),
			),

			//contract
			array(
		        "name"   => "contract.store.do",
		        "module" => "RedCore\contract\Collection",
		        "method" => "store",
		        "params" => array(
		            "contract",
		        ),
		    ),
		    
		    array(
		        "name"   => "contract.delete.do",
		        "module" => "RedCore\contract\Collection",
		        "method" => "delete",
		        "params" => array(
		            "contract",
		        ),
			),
			//ObjectStatus
			array(
		        "name"   => "objectstatus.store.do",
		        "module" => "RedCore\ObjectStatus\Collection",
		        "method" => "store",
		        "params" => array(
		            "objectstatus",
		        ),
		    ),
		    
		    array(
		        "name"   => "objectstatus.delete.do",
		        "module" => "RedCore\ObjectStatus\Collection",
		        "method" => "delete",
		        "params" => array(
		            "objectstatus",
		        ),
			),

			//Building
			array(
		        "name"   => "building.store.do",
		        "module" => "RedCore\Buildings\Collection",
		        "method" => "store",
		        "params" => array(
		            "building",
		        ),
		    ),
		    
		    array(
		        "name"   => "building.delete.do",
		        "module" => "RedCore\Buildings\Collection",
		        "method" => "delete",
		        "params" => array(
		            "building",
		        ),
			),
			//flats
			array(
		        "name"   => "flat.store.do",
		        "module" => "RedCore\Flats\Collection",
		        "method" => "store",
		        "params" => array(
		            "flat",
		        ),
		    ),
		    
		    array(
		        "name"   => "flat.delete.do",
		        "module" => "RedCore\Flats\Collection",
		        "method" => "delete",
		        "params" => array(
		            "flat",
		        ),
			),

			array(
		        "name"   => "flat.copyvertical.do",
		        "module" => "RedCore\Flats\Collection",
		        "method" => "copyvertical",
		        "params" => array(
		            "flat",
		        ),
			),
			array(
		        "name"   => "flats.report.do",
		        "module" => "RedCore\Flats\Collection",
		        "method" => "Report",
		        "params" => array(
		            "flat",
		        ),
			),
			array(
		        "name"   => "flat.copylvls.do",
		        "module" => "RedCore\Flats\Collection",
		        "method" => "copylvls",
		        "params" => array(
		            "flat",
		        ),
			),
			//flatlayout
			array(
		        "name"   => "flatlayout.store.do",
		        "module" => "RedCore\FlatLayout\Collection",
		        "method" => "storeImg",
		        "params" => array(
		            "flatlayout",
		        ),
			),
			array(
		        "name"   => "flatlayout.delete.do",
		        "module" => "RedCore\FlatLayout\Collection",
		        "method" => "delete",
		        "params" => array(
		            "flatlayout",
		        ),
			),
			//expenditure first lvl
			array(
		        "name"   => "expenditurefirst.store.do",
		        "module" => "RedCore\ExpenditureFirst\Collection",
		        "method" => "store",
		        "params" => array(
		            "expenditurefirst",
		        ),
			),
			array(
		        "name"   => "expenditurefirst.delete.do",
		        "module" => "RedCore\ExpenditureFirst\Collection",
		        "method" => "delete",
		        "params" => array(
		            "expenditurefirst",
		        ),
			),
			//expenditure second lvl
			array(
		        "name"   => "expendituresecond.store.do",
		        "module" => "RedCore\ExpenditureSecond\Collection",
		        "method" => "store",
		        "params" => array(
		            "expendituresecond",
		        ),
			),
			array(
		        "name"   => "expendituresecond.delete.do",
		        "module" => "RedCore\ExpenditureSecond\Collection",
		        "method" => "delete",
		        "params" => array(
		            "expendituresecond",
		        ),
			),
			//expenditure third lvl
			array(
		        "name"   => "expenditurethird.store.do",
		        "module" => "RedCore\ExpenditureThird\Collection",
		        "method" => "store",
		        "params" => array(
		            "expenditurethird",
		        ),
			),
			array(
		        "name"   => "expenditurethird.delete.do",
		        "module" => "RedCore\ExpenditureThird\Collection",
		        "method" => "delete",
		        "params" => array(
		            "expenditurethird",
		        ),
			),




			/*array(
				"name"   => "agent.store.do",
				"module" => "RedCore\Agents\Collection",
				"method" => "store",
				"params" => array(
					"agent",
				),
			),
			array(
				"name"   => "contract.store.do",
				"module" => "RedCore\Contracts\Collection",
				"method" => "store",
				"params" => array(
					"contract",
				),
			),
			array(
				"name"   => "document.store.do",
				"module" => "RedCore\Documents\Collection",
				"method" => "store",
				"params" => array(
					"document",
				),
			),*/
		    
		    array(
		        "name"   => "user.auth.do",
		        "module" => "RedCore\Users\Collection",
		        "method" => "auth",
		        "params" => array(
		            "user",
		        ),
		    ),
		    
		    array(
		        "name"   => "user.logout.do",
		        "module" => "RedCore\Users\Collection",
		        "method" => "logout",
		        "params" => array(
		            "user",
		        ),
		    ),
				
		)
	);
	
	public static function Init() {	
		Session::Init();
		
		self::$url = parse_url($_SERVER["REQUEST_URI"]);
		
		self::Action();
		
		self::Route(self::$url["path"]);
		
		self::Body();
		
		switch ($_SERVER["CONTENT_TYPE"]) {
			case "application/json":

				break;
			
			case "application/x-www-form-urlencoded":
				
				break;
			default:
				return false;
		}
	}
	
	private static function Body() {
	    if(!self::isAccess(self::$page)) {
	        $no_has_auth_page = true;
	        
	        foreach(self::$route["pages"] as $page) {
	            if($page["auth"]) {
	                self::$page = $page;
	                $has_auth_page = false;
	            }
	        }
	        
	        if($has_auth_page) self::Redirect('error404');
	    }
	    
		ob_start();
	
		$path = CMS_VIEW . SEP . self::$page["view"];

		if(file_exists($path) AND (is_file($path))) {
			include($path);
		}
		else {
			/*
			 * 404
			 */
		    self::Redirect('error404');
		}
		
		ob_end_flush();
		exit();
	}
	
	private static function Route($link = "") {		
		self::$page = false;
		
		if("/" == $link) {
			foreach(self::$route["pages"] as $page) {
				if($page["default"]) {
					self::$page = $page;
				}
			}
		}
		else {
			foreach(self::$route["pages"] as $page) {
				if($link == (SEP . $page["url"])) {
					self::$page = $page;
				}
			}
		}
		
		if(!self::$page) {
			foreach(self::$route["pages"] as $page) {
				if("page404" == (SEP . $page["url"])) {
					self::$page = $page;
				}
			}
		}
	}
	
	public static function Load() {
		$path = CMS_VIEW . SEP . self::$page["content"];
		
		if(file_exists($path) AND (is_file($path))) {
			include($path);
		}
		else {
			echo "404";
			/*
			 * 404
			 */
		}
	}
	
	public static function Action() {
		$action_name  = Request::vars('action');
		self::$action = false;
		
		foreach(self::$route["actions"] as $action) {
			if($action_name == $action["name"]) {
				self::$action = $action;
				break;
			}
		}
		
		if(self::$action) {
			$module   = (string)$action['module'];
			$method   = (string)$action['method'];
			$params   = (array)$action['params'];
				
			if(!is_array($params)) $params = array($params);
		
			$data = array();
			
			if(is_array($params)) {
				foreach($params as $param) {
					$data[(string)$param] = Request::vars((string)$param);
				}
			}
			
			self::Obj($module)->setObject($param);
			self::Obj($module)->$method($data);
		}
		
		if($redirect = Request::vars('redirect')) {
			header('location: ' . $redirect);
		}
	}
	
	private static function Obj($class = ''){
		$obj = new $class;
		return $obj;
	}
	
	public static function Search($path = "pages", $tag = "") {
		$search  = self::$route[$path];
		$results = array();
		
		foreach($search as $item) {
			if(in_array($tag ,$item["tag"])) {
				$results[] = $item;
			}
		}
		
		return $results;
	}
	
	public static function getUrl() {
		return self::$url['path'];
	}
	
	public static function Redirect($redirect = "/") {
		header('location: ' . $redirect);
	}
	
	public static function isAccess($object = "") {
		//debug(Config::$auth);
		if(Config::$auth) {
	        if(key_exists("access", $object)) {
	            Users::setObject("user");

	            if($role = Users::getAuthRole()) {
	                return (in_array($role, $object["access"]["role"]));
	            }
	            
	            return false;
	        }
	        
	        return true;
	    }
	    
	    return true;
	}
	
	public static function isAuth() {
	    return Users::isAuth();
	}

}


