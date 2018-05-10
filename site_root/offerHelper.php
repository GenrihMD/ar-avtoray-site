<?php

function addOffer($offer)
{
    $params = offerParams($offer);
    $name = offerName($params);
    if (offerExist($name)) {
        updateOffer(
            bitrixFieldsArray($name, $params)
        );
    } else {
        createOffer(
            bitrixFieldsArray($name, $params)
        );
    }
}

function offerExist($name)
{
    $arFilter = array(
        "NAME" => $name,
    );
    $rsItems = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, Array());
    return empty($rsItems);
}

function offerParams($offer)
{
    $params = array();
    foreach ($offer as $key => $value) {
        $newKey = str_replace('-', '_', strtoupper($key));
        $params[$newKey] = $value;
    }
    return $params;
}

function offerName($offer)
{
    return $offer['VIN'] . ' - ' . $offer['MARK'] . ' ' . $offer['MODEL'];
}

function updateOffer($bitrixFieldsArray)
{
    $cIBlockElementHelper = new CIBlockElement;

}

function createOffer($bitrixFieldsArray)
{
    $cIBlockElementHelper = new CIBlockElement;
    $cIBlockElementHelper->Add(
        $bitrixFieldsArray
    );
}

function bitrixFieldsArray($name, $params)
{
    global $USER;
    return Array(
        "MODIFIED_BY" => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
        "IBLOCK_ID" => 3,
        "PROPERTY_VALUES" => $params,
        "NAME" => $name,
        "ACTIVE" => "Y",            // активен
    );
}