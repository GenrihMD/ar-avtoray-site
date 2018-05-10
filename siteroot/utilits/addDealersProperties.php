<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 10.05.18
 * Time: 16:16
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if (!CModule::IncludeModule("iblock")) die('Это фиаско, братан!');
$CIBlockPropertiesHelper = new CIBlockProperty;
$IBLOCK_ID = 3;
$arPropertiesFields = [
    [
        "CODE" => "ID",
        "NAME" => "ID",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "NAME",
        "NAME" => "ИМЯ",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "COMPANY",
        "NAME" => "КОМПАНИЯ",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "BRAND",
        "NAME" => "БРЕНД",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "LONGITUDE",
        "NAME" => "ДОЛГОТА",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "LATITUDE",
        "NAME" => "ШИРОТЫ",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "REGION",
        "NAME" => "ОБЛАСТЬ",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "DISTRICT",
        "NAME" => "ОКРУГ",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "ADDRESS",
        "NAME" => "АДРЕС",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "PHONENUMBER",
        "NAME" => "НОМЕР ТЕЛЕФОНА",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "WWW",
        "NAME" => "WWW",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ], [
        "CODE" => "URL",
        "NAME" => "URL",
        "TYPE" => "S",
        "MULTYPLE" => "N",
        "", ""
    ]
];

foreach ($arPropertiesFields as $arPropertyFields) {
    $arFields = Array(
        "NAME" => $arPropertyFields["NAME"],
        "ACTIVE" => "Y",
        "SORT" => "500",
        "CODE" => $arPropertyFields["CODE"],
        "PROPERTY_TYPE" => $arPropertyFields["TYPE"],
        "IBLOCK_ID" => $IBLOCK_ID,
        "MULTIPLE" => $arPropertyFields["MULTIPLE"]
    );
    $CIBlockPropertiesHelper->Add($arFields);
}
















