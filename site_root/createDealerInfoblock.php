<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 10.05.18
 * Time: 15:48
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if (!CModule::IncludeModule("iblock")) die('Это фиаско, братан!');

$ACTIVE            =  'Y';
$NAME              =  '';
$CODE              =  '';
$LIST_PAGE_URL     =  '';
$DETAIL_PAGE_URL   =  '';
$type              =  '';
$SORT              =  '';
$arPICTURE         =  '';
$DESCRIPTION       =  '';
$DESCRIPTION_TYPE  =  '';


$ib = new CIBlock;
$arFields = Array(
    "ACTIVE" => $ACTIVE,
    "NAME" => $NAME,
    "CODE" => $CODE,
    "LIST_PAGE_URL" => $LIST_PAGE_URL,
    "DETAIL_PAGE_URL" => $DETAIL_PAGE_URL,
    "IBLOCK_TYPE_ID" => $type,
    "SITE_ID" => Array("en", "de"),
    "SORT" => $SORT,
    "PICTURE" => $arPICTURE,
    "DESCRIPTION" => $DESCRIPTION,
    "DESCRIPTION_TYPE" => $DESCRIPTION_TYPE,
    "GROUP_ID" => Array("2"=>"D", "3"=>"R")
);
if ($ID > 0)
    $res = $ib->Update($ID, $arFields);
else
{
    $ID = $ib->Add($arFields);
    $res = ($ID>0);
}
?>