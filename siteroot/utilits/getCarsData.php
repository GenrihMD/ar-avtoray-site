<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if (!CModule::IncludeModule("iblock")) die('Это фиаско, братан!');
include 'simpleXmlToArray.php';
include 'offerHelper.php';


echo '<pre>';

$opts = array(
    'http' => array(
        'method' => "GET",
        'timeout' => 360,
        "header" => "Accept: xml/*, text/*, */*\r\n",
        "ignore_errors" => false
    )
);

$url = 'http://api.ilsa.ru/auto/v1/offers?q=dealer%3ARU73DT01&t=ASC&access_token=NjI5NmVmNmFkMzc3YWVjZDc3MmFiYTFiMDI2ZTk5ZGUyOTM4YzA3ODZiMTA1OTAwNzA1NjdjODcxYTBlOWY0YQ';
//$url = 'http://api.ilsa.ru/auto/v1/offers?q=dealer%3ARU73NI01&t=ASC&access_token=NjI5NmVmNmFkMzc3YWVjZDc3MmFiYTFiMDI2ZTk5ZGUyOTM4YzA3ODZiMTA1OTAwNzA1NjdjODcxYTBlOWY0YQ';
//$url = 'http://api.ilsa.ru/auto/v1/offers?q=dealer:RU73HY02&t=ASC&access_token=NjI5NmVmNmFkMzc3YWVjZDc3MmFiYTFiMDI2ZTk5ZGUyOTM4YzA3ODZiMTA1OTAwNzA1NjdjODcxYTBlOWY0YQ';
$context = stream_context_create($opts);
$file = file_get_contents($url, false, $context);
$xml = new SimpleXMLElement($file);
$offers = $xml->xpath('//asc-stock/offers/offer');

foreach ($offers as $offer) {
    $arOffer = simpleXmlToArray($offer);
    $arOffer['CAR_DEALER'] = 81;
    addOffer($arOffer);
}

echo '</pre>';