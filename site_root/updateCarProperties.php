<?php
if (!CModule::IncludeModule("iblock")) die('Это фиаско, братан!');
$CIBlockPropertiesHelper = new CIBlockProperty;
$arPropertiesFields = [
    ["VIN", "VIN", "S", "N"],
    ["ID", "ID", "N", "N"],
    ["URL", "URL", "S", "N"],
    ["MURL", "MURL", "S", "N"],
    ["CAR_CREATE_DATE", "Дата создания автомобиля", "S", "N"],
    ["CAR_UPDATE_DATE", "Дата обновления автомобиля", "S", "N"],
    ["PRICE_UPDATE_DATE", "День обновления цены", "S", "N"],
    ["CAR_VALID_THRU_DATE", "Автомобиль действителен до", "S", "N"],
    ["MARK", "Марка", "S", "N"],
    ["MODEL", "Модель", "S", "N"],
    ["GENERATION", "Поколение", "S", "N"],
    ["MODIFICATION", "Модификация", "S", "N"],
    ["MODIFICATION_ILSA", "Модификация ilsa", "S", "N"],
    ["MODIFICATION_CODE", "Модификационный код", "S", "N"],
    ["YEAR", "Год", "S", "N"],
    ["EXTERIOR_COLOR", "Внешний цвет", "S", "N"],
    ["EXTERIOR_CODE", "Внешний код", "S", "N"],
    ["BODY_TYPE", "Тип кузова", "S", "N"],
    ["DOORS_COUNT", "Количество дверей", "N", "N"],
    ["DISPLACEMENT", "Смещение", "S", "N"],
    ["ENGINE_TYPE", "Тип двигателя", "S", "N"],
    ["HORSE_POWER", "Лошадиные силы", "N", "N"],
    ["TRANSMISSION", "Коробка передач", "S", "N"],
    ["GEAR_TYPE", "Тип привода", "S", "N"],
    ["STEERING_WHEEL", "Руль", "S", "N"],
    ["STOCK", "Акции", "S", "N"],
    ["STATE", "Государство", "S", "N"],
    ["CAR_LOCATION", "Местоположение", "S", "N"],
    ["RUN", "Пробег", "N", "N"],
    ["RUN_METRIC", "Метрика пробега", "S", "N"],
    ["PRICE", "Цена", "N", "N"],
    ["BASE_PRICE", "Основная цена", "N", "N"],
    ["SALE_PRICE", "Цена продажи", "N", "N"],
    ["MONTHLY_PAYMENT", "Ежемесячно оплата", "N", "N"],
    ["CURRENCY_TYPE", "Тип валюты", "S", "N"],
    ["HAGGLE", "Торг", "S", "N"],
    ["CUSTOM_HOUSE_STATE", "Таможенный дом", "S", "N"],
    ["SELLER", "Продавец", "S", "N"],
    ["SELLER_CITY", "Продавеца город", "S", "N"],
    ["SELLER_PHONE", "Продавеца телефон", "S", "N"],
    ["ADDITIONAL_INFO_EXTERIOR", "Дополнительная информация экстерьер", "S", "N"],
    ["ADDITIONAL_INFO_INTERIOR", "Дополнительная информация интерьер", "S", "N"],
    ["ADDITIONAL_INFO_SAFETY", "Дополнительная информация безопасность", "S", "N"],
    ["ADDITIONAL_INFO_COMFORT", "Дополнительная информация комфорт", "S", "N"],
    ["ADDITIONAL_INFO_WARRANTY", "Дополнительная информация гарантия", "S", "N"],
    ["EQUIPMENT_EXTERIOR", "Экстерьер (оснащение;оборудование)", "S", "N"],
    ["EQUIPMENT_INTERIOR", "Интерьер (оснащение;оборудование)", "S", "N"],
    ["EQUIPMENT_SAFETY", "Безопасность (оснащение;оборудование)", "S", "N"],
    ["EQUIPMENT_COMFORT", "Комфорт (оснащение;оборудование)", "S", "N"],
    ["EQUIPMENT", "Оснащение;оборудование", "S", "Y"],
    ["IMAGE", "Изображения", "S", "Y"],
];

foreach ($arPropertiesFields as $arPropertyFields) {
    $res = CIBlockProperty::GetByID(
        $arPropertyFields[0], false, "Cars"
    );
    if ($ar_res = $res->GetNext()) $ID = $ar_res['ID'];
    $arFields = Array(
        "NAME" => $arPropertyFields[1],
        "ACTIVE" => "Y",
        "SORT" => "500",
        "PROPERTY_TYPE" => $arPropertyFields[2],
        "MULTIPLE" => $arPropertyFields[3]
    );
    if (!$CIBlockPropertiesHelper->Update($ID, $arFields))
        echo $CIBlockPropertiesHelper->LAST_ERROR;
}


