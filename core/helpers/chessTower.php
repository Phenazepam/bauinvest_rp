<?php
namespace RedCore;

class ChessTower{


    private $cols='';
    private $rows='';

    private $fields = array();
    private $rs='';


    public static function Create($cols, $rows, $flats=array()) {
		$obj           = new ChessTower;
		$obj->fields   = array();
		$obj->flats   = $flats;
        $obj->rs       = '';
        $obj->cols = $cols;
        $obj->rows = $rows;
		return $obj;
    }
    
    private $top_block = '<div class="section__houseWrap">
    <div class="section__house section__house-floor">
        <div class="section__h"></div>
        <div class="section__houseCenterer g-dib">
        <table class="section__houseTable">
        <tbody>';

    private $roof_block = '<div class="section__house">
    <div class="section__h"></div>
    <div class="g-dib">
        <div class="section__roof">
            <table class="section__roofTopTable">
                <tbody>
                    <tr>
                        <td class="section__roofTd section__roofTd-1"></td>
                        <td class="section__roofTd section__roofTd-2"></td>
                        <td class="section__roofTd section__roofTd-3"></td>
                        <td class="section__roofTd section__roofTd-4"></td>
                        <td class="section__roofTd section__roofTd-5"></td>
                        <td class="section__roofTd section__roofTd-6"></td>
                        <td class="section__roofTd section__roofTd-7"></td>
                    </tr>
                    <tr>
                        <td class="section__roofTd section__roofTd-1"></td>
                        <td class="section__roofTd section__roofTd-2"></td>
                        <td class="section__roofTd section__roofTd-3"></td>
                        <td class="section__roofTd section__roofTd-4"></td>
                        <td class="section__roofTd section__roofTd-5"></td>
                        <td class="section__roofTd section__roofTd-6"></td>
                        <td class="section__roofTd section__roofTd-7"></td>
                    </tr>
                    <tr>
                        <td class="section__roofTd section__roofTd-1"></td>
                        <td class="section__roofTd section__roofTd-2"></td>
                        <td class="section__roofTd section__roofTd-3"></td>
                        <td class="section__roofTd section__roofTd-4"></td>
                        <td class="section__roofTd section__roofTd-5"></td>
                        <td class="section__roofTd section__roofTd-6"></td>
                        <td class="section__roofTd section__roofTd-7"></td>
                    </tr>
                </tbody>
            </table>
            <table class="section__roofBottomTable">
                <tbody>
                    <tr>
                        <td class="section__roofOuter"></td>
                    </tr>
                </tbody>
            </table>
        </div>';
    

    public function Build(){
        $this->rs.= $this->top_block;
        for($i=$this->rows; $i > 0; $i--){
            $this->rs.='
            <tr>
                <td class="section__houseTd section__houseTd-noBorder">'.$i.'</td>
            </tr>';
        }
        $flats = $this->flats;
        /* $flats = array(
            "1"=> array(2,3),
            "2"=> array(1,1),
            "3"=> array(1,2),
        ); */
        $this->rs.='</tbody>
                </table>
            </div>
        </div>';
        $this->rs.= $this->roof_block;

        $this->rs.='<table class="section__houseTable section__houseTable-house">
                    <tbody>';
        
        $temp='';
        for($y=$this->rows; $y > 0; $y--){
            $temp .=  '<tr>';
            for($x=1; $x<=$this->cols; $x++){
                $found = false;
                foreach($flats as $val){
                    if(($val["y"]==$y) AND ($val["x"]==$x)){
                        $temp.= '<td class="section__houseTd section__houseTd-189 section__houseTd-sold section__houseTd-vkbn-sold section__houseTd-special-false section__houseTd-red-false" data-house="pochta18" data-house-name="ЖК «Почтовый», Дом 18" data-section="" data-entrance="1" data-floor="22" data-rooms="2" data-area-full="64.50" data-area-live="62.90" data-area-rooms="32.30" data-area-kitchen="14.60" data-num="189" "="" data-plan-img="/base/img/plans/pochta18/1_16-22_2_64,5.png" data-status="sold" data-status-name="продана" data-status-vkbn="sold" data-status-vkbn-name="продана" data-book-time="" data-cost-m2="51000.00" data-cost-total="3289500.00" data-events="" data-events-name="" data-user="undefined" data-date="undefined" data-fio="undefined" data-phone="undefined" data-comment="undefined" data-special="false" data-red="false"><span class="section__houseNum section__houseNum-room">'. $val["rooms"].'</span><span class="section__houseNum section__houseNum-number g-hidden">189</span></td>';
                        $found = true;
                    }
                }
                if(!$found){
                    $temp.= '<td class="section__houseTd section__houseTd-189 section__houseTd-free section__houseTd-vkbn-free section__houseTd-special-false section__houseTd-red-false" data-house="pochta18" data-house-name="ЖК «Почтовый», Дом 18" data-section="" data-entrance="1" data-floor="22" data-rooms="2" data-area-full="64.50" data-area-live="62.90" data-area-rooms="32.30" data-area-kitchen="14.60" data-num="189" "="" data-plan-img="/base/img/plans/pochta18/1_16-22_2_64,5.png" data-status="sold" data-status-name="продана" data-status-vkbn="sold" data-status-vkbn-name="продана" data-book-time="" data-cost-m2="51000.00" data-cost-total="3289500.00" data-events="" data-events-name="" data-user="undefined" data-date="undefined" data-fio="undefined" data-phone="undefined" data-comment="undefined" data-special="false" data-red="false"><span class="section__houseNum section__houseNum-room">&#65794</span><span class="section__houseNum section__houseNum-number g-hidden">189</span></td>';
                }
                
            }



            $temp .=  '</tr>';
        }
        $this->rs.=$temp;

        $this->rs.='
                </tbody>
                        </table>
                    </div>
                </div>
            </div>';
        return $this->rs;
    }



}
?>
<style>
body {
	margin: 0;
}
html {
	line-height: 1.15;
	-webkit-text-size-adjust: 100%;
}
::selection {
	background: #b3d4fc;
	text-shadow: none;
}
*, *::before, *::after {
	-webkit-box-sizing: inherit;
	box-sizing: inherit;
	max-height: 999999px;
}
html {
	background: #f5f5f5;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	color: #161d34;
	font: 18px/1.35 "Bauinvest RobotoExo", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue Cyr", "Helvetica CY", Roboto, Ubuntu, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	min-width: 600px;
	text-align: center;
}
.section__houseContent {
	font-size: 16px;
	line-height: 20px;
}
.section__houseContent {
	padding: 0 7px;
	position: relative;
}
.section {
	-webkit-box-sizing: content-box;
	box-sizing: content-box;
	position: relative;
}
.objectsInfo, .checkMate {
	padding: 40px;
}
.landing__line {
	margin: 30px 8px 0;
}
/* @media only screen and (min-width:1041px) */
.landing__line {
	margin-left: auto;
	margin-right: auto;
	width: 1020px;
}
.g-bgWhite {
	background: #fff;
}
.landing__line-checkMate {
	position: relative;
}
.landing__wrap {
	margin: 0 auto;
	max-width: 1920px;
	overflow: hidden;
	background: #f3f3f3;
}
.landing__wrap-checkMate {
	overflow: visible;
}
/* @media only screen and (min-width:1041px) */
main {
	margin-top: 206px;
}
/* @media only screen and (min-width:1500px) */
main {
	margin-top: 228px;
}
/* @media screen and (min-width:1041px) */
main {
	margin-top: 170px;
}
.main-content {
	padding-top: 130px;
}
/* @media only screen and (min-width:1041px) */
.main-content {
	padding-top: 0px;
}
.section__houseWrap {
	display: inline-block;
	padding: 10px 10px 5px 0;
	white-space: nowrap;
}
.section__houseContent :last-of-type.section__houseWrap {
	padding-right: 0px;
}
.section__house {
	display: inline-block;
	vertical-align: top;
}
.section__h {
	padding-bottom: 6px;
	text-align: center;
}
.g-dib {
	display: inline-block;
	vertical-align: middle;
}
.section__houseTable {
	border: 1px solid #999;
	border-spacing: 1px;
	border-collapse: separate;
}
.section__houseTd-vkbn-sold {
	pointer-events: none;
}
.section__houseTd-noBorder {
	height: 34px;
}
/* @media only screen and (min-width:1041px) */
.section__houseTd-noBorder {
	padding: 4px;
}
/* @media only screen and (min-width:1560px) */
.section__houseTd-noBorder {
	padding: 5px;
}
.section__houseTd {
	border: 2px solid #999;
	cursor: pointer;
	position: relative;
}
.section__houseTd-vkbn-sold, .section__houseTd-vkbn-pay {
	background: #adadad;
}
/* @media only screen and (min-width:1041px) */
.section__houseNum {
	padding: 2px 0;
}
/* @media only screen and (min-width:1560px) */
.section__houseNum {
	padding: 3px 0;
}
.g-hidden {
	display: none !important;
}
.section__houseNum {
	display: block;
	padding: 0 0;
	text-align: center;
	width: 28px;
}
.section__houseTd-vkbn-book {
	background: url(../img/book-bg-min.png) center center no-repeat;
}
.section__houseTd-free.section__houseTd-special-true, .section__houseTd-vkbn-free.section__houseTd-special-true, .section__houseTd-book.section__houseTd-special-true, .section__houseTd-vkbn-book.section__houseTd-special-true, .section__houseTd-pay.section__houseTd-special-true, .section__houseTd-vkbn-pay.section__houseTd-special-true {
	border-color: #2caf31 !important;
}
.section__houseTd-free.section__houseTd-red-true, .section__houseTd-vkbn-free.section__houseTd-red-true, .section__houseTd-book.section__houseTd-red-true, .section__houseTd-vkbn-book.section__houseTd-red-true, .section__houseTd-pay.section__houseTd-red-true, .section__houseTd-vkbn-pay.section__houseTd-red-true {
	border-color: #af2c2c !important;
}
.section__roofTopTable {
	border-collapse: collapse;
	width: 100%;
}
.section__roofBottomTable {
	border-collapse: collapse;
	width: 100%;
}
.section__roofOuter {
	background: #999;
	border-color: #999;
	padding: 2px;
}
.section__roofTd {
	border: 1px solid #999;
	padding: 1px;
}
.section__roofTd-1 {
	width: 12%;
}
.section__roofTd-2 {
	width: 9%;
}
.section__roofTd-3 {
	width: 11%;
}
.section__roofTd-4 {
	width: 15%;
}
.section__roofTd-5 {
	width: 17%;
}
.section__roofTd-6 {
	width: 19%;
}
.section__roofTd-7 {
	width: 17%;
}
.section__house-floor .section__houseCenterer {
	margin-top: 14px;
}
.section__house-floor .section__houseTable {
	border-right: 0;
}
.section__houseTd-noBorder {
	border: 0;
	cursor: auto;
	padding: 0px;
}
</style>