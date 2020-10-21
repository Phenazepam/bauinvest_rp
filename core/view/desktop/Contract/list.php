<?php
  use RedCore\accountingentity\Collection as AccountingEntity;
  use RedCore\saletype\Collection as SaleType;
  use RedCore\ContractTypes\Collection as ContractTypes;
  use RedCore\contractstatus\Collection as ContractStatus;
  use RedCore\agency\Collection as Agency;
  use RedCore\promotion\Collection as Promotion;
  use RedCore\CalculationForm\Collection as CalculationForm;
  use RedCore\mortgagebank\Collection as MortgageBank;
  use RedCore\Flats\Collection as Flats;
  use RedCore\Buildings\Collection as Buildings;
  use RedCore\Facingtypes\Collection as FacingType;
  use RedCore\Users\Collection as Users;
    
  use \RedCore\Contract\Collection as Contract;
  use \RedCore\Where as Where;

  /* $temp = $SaleType["id"]->getFieldSet("saletype-list")->title;
  var_dump($temp); */
//авторизованный пользователь
Users::setObject();
$role = Users::getAuthRole();

AccountingEntity::setObject();
$AccountingEntity = AccountingEntity::getList();

SaleType::setObject();
$SaleType = SaleType::getList();

ContractTypes::setObject();
$ContractTypes = ContractTypes::getList();


ContractStatus::setObject();
$ContractStatus = ContractStatus::getList();


Agency::setObject();
$Agency = Agency::getList();


Promotion::setObject();
$Promotion = Promotion::getList();


CalculationForm::setObject();
$CalculationForm = CalculationForm::getList();


MortgageBank::setObject();
$MortgageBank = MortgageBank::getList();


Flats::setObject("flat");
$Flats = Flats::getList();

Buildings::setObject("building");
$Buildings = Buildings::getList();


FacingType::setObject();
$FacingType = FacingType::getList();

$where = Where::Cond()
    ->add("_deleted", "=", "0")
    ->parse();
Contract::setObject("contract");
$items = Contract::getList($where);


var_dump($Flats);

?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ДОГОВОРЫ<small>реестр записей</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <a class="btn btn-primary" href="/contract-form">Добавить <i class="fa fa-plus"></i></a>
		<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>№ п/п</th>
                          <th>Субъект учета</th>
                          <th>Номер договора</th>
                          <th>Дата договора</th>
                          <th>Дата создания договора</th>
                          <th>Дата регистрации договора</th>
                          <th>Тип продажи</th>
                          <th>Тип договора</th>
                          <th>Статус договора</th>
                          <th>Сумма договора</th>
                          <!-- <th>РосФинМониторинг</th>
                          <th>НДС</th> -->
                          <th>Агенства недвижимости</th>
                          <th>Риелторские вознаграждения</th>
                          <th>Акции</th>
                          <th>Форма расчета</th>
                          <th>Ипотечный банк</th>
                          <th>График платежей</th>
                          <th>Объект продажи</th>
                          <th>Вид отделки</th>


                          <th>Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i =  1;
                        
                        foreach($items as $key => $item):
                          $oFS = $item->getFieldSet("contract-list");

                          /* var_dump($oFS->contractStatus);
                          var_dump($MortgageBank); */
                      ?>
                        <tr>
                          
                          <td><?=$i++?></td>
                          <td><?=$AccountingEntity[$oFS->accountingEntity]->object->title?></td>
                          <td><?=$oFS->contractNumber?></td>
                          <td><?=date('d.m.Y',strtotime($oFS->contractDate))?></td>
                          <td><?=date('d.m.Y',strtotime($oFS->creationDate))?></td>
                          <td><?=date('d.m.Y',strtotime($oFS->registrationDate))?></td>
                          <td><?=$SaleType[$oFS->saleType]->object->title?></td>
                          <td><?=$ContractTypes[$oFS->contractTypes]->object->title?></td>
                          <td><?=$ContractStatus[$oFS->contractStatus]->object->title?></td>
                          <td><?=$oFS->contractPrice?></td>
                          
                          <td><?=$Agency[$oFS->agency]->object->title?></td>
                          <td><?=$oFS->realtorReward?></td>
                          <td><?=$Promotion[$oFS->promotion]->object->title?></td>
                          <td><?=$CalculationForm[$oFS->calculationForm]->object->title?></td>
                          <td><?=$MortgageBank[$oFS->mortgageBank]->object->title?></td>
                          <td><?=$oFS->paymentSchedule?></td>
                          <td><?="ЖК ".$Buildings[$Flats[$oFS->saleObject]->object->id]->object->complex .
                                ", Литер ".$Buildings[$Flats[$oFS->saleObject]->object->id]->object->liter .
                                ", Квартира ".$Flats[$oFS->saleObject]->object->params->number?></td>
                          <td><?=$FacingType[$oFS->facingType]->object->title?></td>

                          <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Действия
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/contract-form-view?contract_id=<?=$oFS->id?>">Просмотр</a>
                              <? if((3 == $role) OR (4 == $role) OR ((2 == $role) AND (3 == $oFS->stage_status)) ) : ?>
                              <a class="dropdown-item" href="/contract-form?contract_id=<?=$oFS->id?>">Редактировать</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/contract-list?action=contract.delete.do&contract[id]=<?=$oFS->id?>">Удалить</a>
                              <? endif; ?>
                            </div>
                          </div>
                          </td>
                        </tr>
                       <?
                        endforeach;
                       ?>
                      </tbody>
                    </table>
            
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>




		


		