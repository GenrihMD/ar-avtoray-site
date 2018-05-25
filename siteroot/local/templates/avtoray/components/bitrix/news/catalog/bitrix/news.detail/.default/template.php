<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);

$props = $arResult["DISPLAY_PROPERTIES"];

$page_title = $props['MARK']['DISPLAY_VALUE'] . " - " . $props['MODEL']['DISPLAY_VALUE'];
$APPLICATION->SetTitle($page_title);
$APPLICATION->SetPageProperty('title', $page_title);

$dealerLink = $props['CAR_DEALER'];
$dealerLinkValue = (int)$dealerLink['VALUE'];
$dealerElementID = $dealerLinkValue;
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_*");
$arFilter = Array("ID" => $dealerElementID, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);

$serializedViewed = $_COOKIE["viewdcars"];
$unserializedViewed = unserialize($serializedViewed);
if (!is_array($unserializedViewed)) {
    $viewed = [0, 0, 0, 0];
} else {
    $viewed = $unserializedViewed;
}

if ($dp = $res->GetNextElement())
    $dealer_props = $dp->GetProperties();
else
    $dealer_props = [];

$interestedElements = CIBlockElement::GetList(
    Array("PROPERTY_PRICE" => "ASC"),
    Array("IBLOCK_ID" => 2, ">=PROPERTY_PRICE" => $props['PRICE']['VALUE'], "!PROPERTY_MARK" => $props['MARK']['VALUE']),
    false,
    Array(),
    Array()
);

$interestedValues = [];
$i = 0;

while ($el = $interestedElements->GetNextElement()) {
    if ($i >= 4) break;
    $properties = $el->GetProperties();
    foreach ($properties as $code => $property) {
        $propertieValues[$code] = $property['VALUE'];
    }
    if ($i >= 1 && $propertieValues["MARK"] == $interestedValues[$i - 1]["MARK"]) continue;

    $interestedValues[$i] = $propertieValues;
    $interestedValues[$i]['field_id'] = $el->GetFields()['ID'];
    $i += 1;
}

$t = [
    'mark' => $props['MARK']['DISPLAY_VALUE'],
    'model' => $props['MODEL']['DISPLAY_VALUE'],
    'price' => $props['PRICE']['DISPLAY_VALUE'],
    'year' => $props['YEAR']['DISPLAY_VALUE'],
    'horse_power' => $props['HORSE_POWER']['DISPLAY_VALUE'],
    'sale_price' => $props['SALE_PRICE']['DISPLAY_VALUE'],
    'transmission' => $props['TRANSMISSION']['DISPLAY_VALUE'],
    'run' => $props['RUN']['DISPLAY_VALUE'],
    'run_metric' => $props['RUN_METRIC']['DISPLAY_VALUE'],
    'body_type' => $props['BODY_TYPE']['DISPLAY_VALUE'],
    'engine_type' => $props['ENGINE_TYPE']['DISPLAY_VALUE'],
    'gear_type' => $props['GEAR_TYPE']['DISPLAY_VALUE'],
    'displacement' => $props['DISPLACEMENT']['DISPLAY_VALUE'],
    'additional_info_exterior' => $props['ADDITIONAL_INFO_EXTERIOR']['DISPLAY_VALUE'],
    'additional_info_interior' => $props['ADDITIONAL_INFO_INTERIOR']['VALUE'],
    'additional_info_safety' => $props['ADDITIONAL_INFO_SAFETY']['VALUE'],
    'additional_info_comfort' => $props['ADDITIONAL_INFO_COMFORT']['VALUE'],
    'additional_info_warranty' => $props['ADDITIONAL_INFO_WARRANTY']['VALUE'],
    'image' => $props['IMAGE']['VALUE'][0],
    'dealer_name' => $dealer_props['NAME']['VALUE'],
    'dealer_longitude' => $dealer_props['LONGITUDE']['VALUE'],
    'dealer_latitude' => $dealer_props['LATITUDE']['VALUE'],
    'dealer_address' => $dealer_props['ADDRESS']['VALUE'],
    'dealer_phonenumber' => $dealer_props['PHONENUMBER']['VALUE'],
    'dealer_www' => $dealer_props['WWW']['VALUE'],
    'interested' => $interestedValues,
    //    'dealer_' => '',
    //    'dealer_' => '',
    '' => '',
];

$t['price'] = number_format($t['price'], 0, ',', ' ');
$t['run'] = $t['run'] > 0 ? $t['run'] . ' ' . $t['run'] : 'без пробега';
$t['additional_info_exterior'] = str_replace("*", "", str_replace('•', '<br>•', $t['additional_info_exterior']));
$t['additional_info_interior'] = str_replace("*", "", str_replace('•', '<br>•', $t['additional_info_interior']));
$t['additional_info_safety'] = str_replace("*", "", str_replace('•', '<br>•', $t['additional_info_safety']));
$t['additional_info_comfort'] = str_replace("*", "", str_replace('•', '<br>•', $t['additional_info_comfort']));
$t['additional_info_warranty'] = str_replace("*", "", str_replace('•', '<br>•', $t['additional_info_warranty']));
$t['displacement'] = round($t['displacement'] / 1000, 1); ?>
<main class="catalog-detail">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="slider">
                    <div class="slides">
                        <div class="slide"><img src="<?php echo $t['image']; ?>"/></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="right-panel">
                    <h1 class="name"><?php
                        echo $t['mark'] . ' ' . $t['model'] ?>
                    </h1>
                    <div class="features row">
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                </div>
                                <div class="faeture__name">Год выпуска:</div>
                                <div class="feature__value">
                                    <?php echo $t["year"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAB3ElEQVQ4T41US3LTQBB9T4DFLskJEEuiomJvQF5h2QcgnID4BIEb+AaEE+Ab4BPI3lmwiasoJUt8g8i7yBTTVEsa48+I0FWqmprped3vvR4Re5GkWQ7giP76JO50dP1fQc1K5jdjUM4AyQH26ptLALkAi0EUDh9Cq4DSTC89a0heUbx23H2hOY1hgSYA3gJYkbzQbBEZATgDsOxH4fMHO7KaVJcxHHTDsa6n327OReRrDZD3o/Dknx0laSY2YQdo/qMn9Kb2rB+FZffT+W0g/P2F9D7Hr0+VSRksDzwzhuCN0gDwAcbL4ZkrAO2Srr8O8KsVGINLQoLaEHW0/PpR2LEaLWo9XN0v6a87pngyInjpSFj8BarsP68rWPdWdgzor3um8C8I+eSqJMCk7MhyV4utZqrJ9Pr6uDy8f9ze1ssBttoAbQC/Z6oL4leh0t0UEcgIlPeujvQVHADZxCTNJiTH1pnKLfPTCSQmPgBK0kw7UZ0qWkBOcohWMZOiNRPIjCiH9kjHBeTxIDq9agLSid4EyXfbM6PDagSBAtikHSClUz+VAwZ2IF3UdG8HqNZhtv+ABfy4Xd2p0/6m609AMXHcfakFGuPQ/vltgKf3uRStOxXTe4TF9ig0If0BixDSbXc4Lb0AAAAASUVORK5CYII="/>
                                </div>
                                <div class="faeture__name">Привод:</div>
                                <div class="feature__value">
                                    <?php echo $t["gear_type"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAABrElEQVQ4T52UQVLCMBSG/1dHWaInEJcSHelGykpaDiDeQE8gngC4AZ5AjiAHoMUVZQWOFpfCDXAJjjwnJe0EsMD4dmmSP3n//6Xk9fuHmO5XGVQGkMHmGjiWML3uR4bp5wmgIsAdSn3fUNt/bxDofotANP3qWCLn+sEzgGttT4tcP5gASJMB074Ug10EXT/g1XX/FRoBONbExtTuBjUiVBNuMmJgYLDxYBdO5eawvO5bkcnwojHx3CY5UD5Js/VTdO0JsWHqYpG3DH4sWWeVUCipwnSMeROMKwAtxxLysLjc7rDpFLK38sNGoUUbMur5J4CRY4mTpENDIa83LDOz9CkHYEBEdTuflRGHFSebmh3ZpilTXitaNU430C6cd5SQ4oY7xHt3ulfxercXdJQHy6cQXpy8KGrtScbS2qKlRCVHa3BFix1LxB4qrxqqfT3dMFEptApXpDN2LJH49lYTTQSSGfVSQdS24qESJfn6eXog+19GPjXLJSUUiWtojBfx/4F8lNhGWONfCVqxmTHyqiXXD+QtLza1pua+iI3cEtk68jsIjUN42ahIrn4BoBLlPriV8pAAAAAASUVORK5CYII="/>
                                </div>
                                <div class="faeture__name">Пробег:</div>
                                <div class="feature__value">
                                    <?php echo $t["run"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAPCAYAAADtc08vAAABK0lEQVQ4T62SsVHDQBBF/1cAIaYCTIjEjK0IOfJIFABUgDvAVGCoAOjAVAAUgGQiy5HlQCK06EApBFpmZQkcMEJmuOBu7mb3zd9/nyiXP4snEPSre/0pE885dLWGugWz5FREHkRw3QRAYkTyzD0yHwuAP03GoHQ9x+o2AfhhHEEYeT1zsAKEcSbg1bFj3jYBPIfJkJCR51i7rORTjH23d5A2AQTT17YwX+oYLOX3kRuDJs1fNUY+hvCFKh/AzkbN38WZAqS8PwkkJXhRBxPIHcE2gJPiG0vAm+dY+lj9yPmPEOG9Ol8ar37tVYCU2x+2a9tZfaBWAQrm85a8by0BtNZHUKL68VsWIm0EUCheB/zJx38FLCj5sIkMoaGJ7VQj6EwdAS83jPINgMUn9Q+RpLtSVkoAAAAASUVORK5CYII="/>
                                </div>
                                <div class="faeture__name">Кузов:</div>
                                <div class="feature__value">
                                    <?php echo $t["body_type"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAABrUlEQVQ4T5WSQVLCQBBFf09Z6k5voCwlWsJKspKEA6gnEE8AnAA8AdxAOIF6AAiugm7Q0uAWTyDugCqnrUlmYgJqyaymZrp/v/7dhMTp+kGZCHUiqjlH2Zvkn3c/OmXmJjE3HHu/Y/5IXUwigF0AY7dgZZLJ5t4bBGMAOyrGCFHiMc4hlo5jH/RTBP5zkUl4C8LjkKDnj9ogPgfwwYyW2Jy3nHx+khIYDrfldL1KhCqALTB1XDtbDgU8/3VXQpZVIqZrOUmiQsApgEfd1sQge1pIQLQdey8iiEQUItUBKv7Uv36Le0+Z2BsEyvGTPxIXvybEIh8SKCSerb/riDfamOfkbKNM4Oa3q7hzj6xid/DSIlBFvTPjomRb7cjE+6APxnE0HuFI+qyawBhd4ExK1LU3IBaZ2AO9JNcJzidiWVWj1ITtVIt6Aio+NjG5D0Y92XhvEKiJHIZJunpKQG/jFYAnt2DlvIcgxxJDBtVKhWyr6wcNteYAbt2CpUYcnphghQmkQqNF0tX+K8KMy5JtNWKCaImW9vxXvSWB/1b+KY5WxTcixlxaFT8W0D58Ae9B103kF2yMAAAAAElFTkSuQmCC"/>
                                </div>
                                <div class="faeture__name">Мощность:</div>
                                <div class="feature__value">
                                    <?php echo $t["horse_power"] ?> л.с.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAQCAYAAAAmlE46AAAAm0lEQVQ4T2NkgIJ9x68tYGD8H8/wn3Ghk6VWAkwcF8249/jVBiYmhv+EFKLLM+49ca2AkeF/AQMDgzyRmh/+Z2CcwAhSvO/k1QMM/xnsidLIyHDQyVzbYYA07j1xZQIjI6MBMU79////BWcLnQKwU/efumrw/w8TPzEaGVn+fXQ0075AmR+HkFOHSALYd+LqBwYGBqLiECmePwAAurNmAkPFGQwAAAAASUVORK5CYII="/>
                                </div>
                                <div class="faeture__name">Объём:</div>
                                <div class="feature__value">
                                    <?php echo $t["displacement"] ?> л.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                </div>
                                <div class="faeture__name">КПП:</div>
                                <div class="feature__value">
                                    <?php echo $t["transmission"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAASCAYAAACEnoQPAAABPElEQVQ4T8VUQVLCQBDsXg4e9Ql4tNASb+SEkQ/gC5QXqD/AH+AL5Af6AZN4ErwYS+OZJ4SrVW5bC4QiISB6cY8z0z0zPV3LYJDEAA6x/qWUOfK9vdFiGYNBIhCPsojK8ASroM4o6/veQa5mApZw3fJq3TJw+PR2LJowA4fDjzZkm35j/2raGYpIlna2QpXA+Yw4psypaO8FvMzAP2ycT08JoO5fwI4q5tanP90ZujGq9Nw4a5QfS7g0sKNMg3lnCZ2WV+s/DN57BC8Ki7xSpu1ior0DUHcC5sbOCEpVf07qsggB7Lj8EtgFTxo1BsMkgtDMSCizK2P7+Vih82qw9WVM9z/AG4y9gWDOhdtLgq0/lSKq0pmdauKFudoTkxj2ZXHrbrjCrCnJDuxXumSSX7l74c6bfAZF7jFl6t9/QfSECYuuAQAAAABJRU5ErkJggg=="/>
                                </div>
                                <div class="faeture__name">Топливо:</div>
                                <div class="feature__value">
                                    <?php echo $t["engine_type"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buy-and-price__holder row">
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="price"> <?php echo $t['price'] ?>₽</div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="addtion">Зимняя резина в подарок!</div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-12">
                            <div class="in-credit button-type-c">В кредит от 2 605 ₽/месяц</div>
                        </div>
                    </div>
                </div>
                <div class="action-buttons row">
                    <div class="action-buttons__button col-12 col-md-4">
                        <div class="button-type-d">Хочу&nbsp;приобрести</div>
                    </div>
                    <div class="action-buttons__button col-12 col-md-4">
                        <div class="button-type-d">Хочу тест-драйв</div>
                    </div>
                    <div class="action-buttons__button col-12 col-md-4">
                        <div class="button-type-d">Trade-in</div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="right-panel bottom-panel">
                    <div class="desctiption">
                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row jq-collapser detail__desc-collapser">
                                <div class="title col-6"><h2>Внешний вид</h2></div>
                            </header>
                            <section class="main row jq-collapsed" style="padding: 0 15px; transition: none;">
                                <p><?php echo $t['additional_info_exterior'] ?></p>
                            </section>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row jq-collapser detail__desc-collapser">
                                <div class="title col-6"><h2>Внутрення отделка</h2></div>
                            </header>
                            <section class="main row jq-collapsed" style="padding: 0 15px; transition: none;">
                                <p><?php echo $t['additional_info_interior'] ?></p>
                            </section>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row jq-collapser detail__desc-collapser">
                                <div class="title col-6"><h2>Безопасность</h2></div>
                            </header>
                            <section class="main row jq-collapsed" style="padding: 0 15px; transition: none;">
                                <p><?php echo $t['additional_info_safety'] ?></p>
                            </section>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row jq-collapser detail__desc-collapser">
                                <div class="title col-6"><h2>Комфорт</h2></div>
                            </header>
                            <section class="main row jq-collapsed" style="padding: 0 15px; transition: none;">
                                <p><?php echo $t['additional_info_comfort'] ?></p>
                            </section>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row jq-collapser detail__desc-collapser">
                                <div class="title col-6"><h2>Дополнительно</h2></div>
                            </header>
                            <section class="main row jq-collapsed" style="padding: 0 15px; transition: none;">
                                <p><?php echo $t['additional_info_warranty'] ?></p>
                            </section>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<section class="dealer-info">
    <div class="container">
        <div class="row"><h1>Данный автомобиль можно приобрести в салоне <?php echo $t['dealer_name'] ?></h1>
            <div class="info-holder col-12">
                <div class="row">
                    <div class="info col-12 col-md-5 col-lg-3"><h2><?php echo $t['dealer_name'] ?></h2>
                        <h3>Время работы:</h3>
                        <p>ежедневно c 8:00 до 20:00</p>
                        <h3>Адрес:</h3>
                        <p><?php echo $t['dealer_address'] ?></p>
                        <h3>Телефон:</h3>
                        <p><?php echo $t['dealer_phonenumber'] ?></p>
                        <div class="button">
                            <div class="button-type-d">Заказать обратный звонок</div>
                        </div>
                    </div>
                    <div class="map-holder col-12 col-md-7 col-lg-9" id="map">


                    </div>
                    <script>
                      var map;

                      function initMap() {
                        var myLatLng = {
                          lat: <? echo $t['dealer_latitude'] != 0 ? $t['dealer_latitude'] : 54.291415?>,
                          lng: <? echo $t['dealer_longitude'] != 0 ? $t['dealer_longitude'] : 48.26430?>
                        };
                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 14,
                          center: myLatLng,
                          styles: [
                            {
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#f5f5f5"
                                }
                              ]
                            },
                            {
                              "elementType": "labels.icon",
                              "stylers": [
                                {
                                  "visibility": "off"
                                }
                              ]
                            },
                            {
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#616161"
                                }
                              ]
                            },
                            {
                              "elementType": "labels.text.stroke",
                              "stylers": [
                                {
                                  "color": "#f5f5f5"
                                }
                              ]
                            },
                            {
                              "featureType": "administrative.land_parcel",
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#bdbdbd"
                                }
                              ]
                            },
                            {
                              "featureType": "poi",
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#eeeeee"
                                }
                              ]
                            },
                            {
                              "featureType": "poi",
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#757575"
                                }
                              ]
                            },
                            {
                              "featureType": "poi.park",
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#e5e5e5"
                                }
                              ]
                            },
                            {
                              "featureType": "poi.park",
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#9e9e9e"
                                }
                              ]
                            },
                            {
                              "featureType": "road",
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#ffffff"
                                }
                              ]
                            },
                            {
                              "featureType": "road.arterial",
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#757575"
                                }
                              ]
                            },
                            {
                              "featureType": "road.highway",
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#dadada"
                                }
                              ]
                            },
                            {
                              "featureType": "road.highway",
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#616161"
                                }
                              ]
                            },
                            {
                              "featureType": "road.local",
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#9e9e9e"
                                }
                              ]
                            },
                            {
                              "featureType": "transit.line",
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#e5e5e5"
                                }
                              ]
                            },
                            {
                              "featureType": "transit.station",
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#eeeeee"
                                }
                              ]
                            },
                            {
                              "featureType": "water",
                              "elementType": "geometry",
                              "stylers": [
                                {
                                  "color": "#c9c9c9"
                                }
                              ]
                            },
                            {
                              "featureType": "water",
                              "elementType": "labels.text.fill",
                              "stylers": [
                                {
                                  "color": "#9e9e9e"
                                }
                              ]
                            }
                          ]
                        });

                        var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map,
                          title: 'Hello World!'
                        });
                      }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDT8ZzdAOGk9wP1i65nRdvzG1kjI4iuWYU&callback=initMap"
                            async defer></script>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="may-interest">
    <div class="container">
        <div class="row"><h1 class="col-12">Автомобили, которые могут Вас заинтересовать</h1>
            <div class="cards row">
                <?php
                foreach ($interestedValues as $it) { ?>
                    <div class="col-12 col-md-6 col-lg-3">
                    <a href="/catalog/?ELEMENT_ID=<?php echo $it['field_id'] ?>">
                        <article class="catalog-card">
                            <div class="catalog-card__content">
                                <div class="to-left">
                                    <div class="catalog-card__images"><img
                                                src="<?php echo $it['IMAGE'][0] ?>"/>
                                    </div>
                                </div>
                                <div class="to-right">
                                    <div class="catalog-card__title">
                                        <h1><?php
                                            echo $it["MARK"] . " - " . $it["MODEL"] ?>
                                        </h1>
                                    </div>
                                    <div class="catalog-card__options">
                                        <div class="year">
                                            <div class="icon"><img
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                            </div>
                                            <div class="text"><?php echo $it['YEAR'] ?></div>
                                        </div>
                                        <div class="mileage">
                                            <div class="icon"><img
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAABrElEQVQ4T52UQVLCMBSG/1dHWaInEJcSHelGykpaDiDeQE8gngC4AZ5AjiAHoMUVZQWOFpfCDXAJjjwnJe0EsMD4dmmSP3n//6Xk9fuHmO5XGVQGkMHmGjiWML3uR4bp5wmgIsAdSn3fUNt/bxDofotANP3qWCLn+sEzgGttT4tcP5gASJMB074Ug10EXT/g1XX/FRoBONbExtTuBjUiVBNuMmJgYLDxYBdO5eawvO5bkcnwojHx3CY5UD5Js/VTdO0JsWHqYpG3DH4sWWeVUCipwnSMeROMKwAtxxLysLjc7rDpFLK38sNGoUUbMur5J4CRY4mTpENDIa83LDOz9CkHYEBEdTuflRGHFSebmh3ZpilTXitaNU430C6cd5SQ4oY7xHt3ulfxercXdJQHy6cQXpy8KGrtScbS2qKlRCVHa3BFix1LxB4qrxqqfT3dMFEptApXpDN2LJH49lYTTQSSGfVSQdS24qESJfn6eXog+19GPjXLJSUUiWtojBfx/4F8lNhGWONfCVqxmTHyqiXXD+QtLza1pua+iI3cEtk68jsIjUN42ahIrn4BoBLlPriV8pAAAAAASUVORK5CYII="/>
                                            </div>
                                            <div class="text">без пробега</div>
                                        </div>
                                        <div class="power">
                                            <div class="icon"><img
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAABrUlEQVQ4T5WSQVLCQBBFf09Z6k5voCwlWsJKspKEA6gnEE8AnAA8AdxAOIF6AAiugm7Q0uAWTyDugCqnrUlmYgJqyaymZrp/v/7dhMTp+kGZCHUiqjlH2Zvkn3c/OmXmJjE3HHu/Y/5IXUwigF0AY7dgZZLJ5t4bBGMAOyrGCFHiMc4hlo5jH/RTBP5zkUl4C8LjkKDnj9ogPgfwwYyW2Jy3nHx+khIYDrfldL1KhCqALTB1XDtbDgU8/3VXQpZVIqZrOUmiQsApgEfd1sQge1pIQLQdey8iiEQUItUBKv7Uv36Le0+Z2BsEyvGTPxIXvybEIh8SKCSerb/riDfamOfkbKNM4Oa3q7hzj6xid/DSIlBFvTPjomRb7cjE+6APxnE0HuFI+qyawBhd4ExK1LU3IBaZ2AO9JNcJzidiWVWj1ITtVIt6Aio+NjG5D0Y92XhvEKiJHIZJunpKQG/jFYAnt2DlvIcgxxJDBtVKhWyr6wcNteYAbt2CpUYcnphghQmkQqNF0tX+K8KMy5JtNWKCaImW9vxXvSWB/1b+KY5WxTcixlxaFT8W0D58Ae9B103kF2yMAAAAAElFTkSuQmCC"/>
                                            </div>
                                            <div class="text"><?php echo $it['HORSE_POWER'] ?> л. с.</div>
                                        </div>
                                        <div class="gearbox">
                                            <div class="icon"><img
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                            </div>
                                            <div class="text"><?php echo $it['TRANSMISSION'] ?></div>
                                        </div>
                                    </div>
                                    <div class="catalog-card__price">
                                        <div class="now"><?php echo number_format($it['PRICE'], 0, ',', ' '); ?>₽
                                        </div>
                                        <div class="before"><?php echo number_format($it['PRICE'], 0, ',', ' '); ?>
                                            &nbsp;₽
                                            <div class="red-line"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>
                    </div><?php
                } ?>
            </div>
        </div>
    </div>
</section>
<?php
if (array_sum($viewed) != 0) {
    ?>
    <section class="you-viewed">
        <div class="container">
            <div class="row"><h1 class="col-12">Автомобили, которые Вы недавно смотрели</h1>
                <div class="cards row"><?php

                    foreach ($viewed as $value) {
                        if ($value == 0) {
                            ?>
                            <div class="col-12 col-md-6 col-lg-3"></div><?php
                            continue;
                        }
                        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_*");
                        $arFilter = Array("ID" => $value, "ACTIVE" => "Y");
                        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
                        if ($dp = $res->GetNextElement())
                            $viewedCarProps = $dp->GetProperties();
                        else continue;
                        ?>
                        <div class="col-12 col-md-6 col-lg-3">
                        <a href="/catalog/?ELEMENT_ID=<?php echo $value ?>">
                            <article class="catalog-card">
                                <div class="catalog-card__content">
                                    <div class="to-left">
                                        <div class="catalog-card__images"><img
                                                    src="<?php
                                                    echo $viewedCarProps["IMAGE"]["VALUE"][0] ?>"/>
                                        </div>
                                    </div>
                                    <div class="to-right">
                                        <div class="catalog-card__title"><h1><?php
                                                echo $viewedCarProps["MARK"]["VALUE"] . " - " . $viewedCarProps["MODEL"]["VALUE"] ?>
                                            </h1></div>
                                        <div class="catalog-card__options">
                                            <div class="year">
                                                <div class="icon"><img
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                                </div>
                                                <div class="text"><?php
                                                    echo $viewedCarProps["YEAR"]["VALUE"] ?>
                                                </div>
                                            </div>
                                            <div class="mileage">
                                                <div class="icon"><img
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAABrElEQVQ4T52UQVLCMBSG/1dHWaInEJcSHelGykpaDiDeQE8gngC4AZ5AjiAHoMUVZQWOFpfCDXAJjjwnJe0EsMD4dmmSP3n//6Xk9fuHmO5XGVQGkMHmGjiWML3uR4bp5wmgIsAdSn3fUNt/bxDofotANP3qWCLn+sEzgGttT4tcP5gASJMB074Ug10EXT/g1XX/FRoBONbExtTuBjUiVBNuMmJgYLDxYBdO5eawvO5bkcnwojHx3CY5UD5Js/VTdO0JsWHqYpG3DH4sWWeVUCipwnSMeROMKwAtxxLysLjc7rDpFLK38sNGoUUbMur5J4CRY4mTpENDIa83LDOz9CkHYEBEdTuflRGHFSebmh3ZpilTXitaNU430C6cd5SQ4oY7xHt3ulfxercXdJQHy6cQXpy8KGrtScbS2qKlRCVHa3BFix1LxB4qrxqqfT3dMFEptApXpDN2LJH49lYTTQSSGfVSQdS24qESJfn6eXog+19GPjXLJSUUiWtojBfx/4F8lNhGWONfCVqxmTHyqiXXD+QtLza1pua+iI3cEtk68jsIjUN42ahIrn4BoBLlPriV8pAAAAAASUVORK5CYII="/>
                                                </div>
                                                <div class="text"><?php
                                                    echo $viewedCarProps["RUN"]["VALUE"] ?></div>
                                            </div>
                                            <div class="power">
                                                <div class="icon"><img
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAABrUlEQVQ4T5WSQVLCQBBFf09Z6k5voCwlWsJKspKEA6gnEE8AnAA8AdxAOIF6AAiugm7Q0uAWTyDugCqnrUlmYgJqyaymZrp/v/7dhMTp+kGZCHUiqjlH2Zvkn3c/OmXmJjE3HHu/Y/5IXUwigF0AY7dgZZLJ5t4bBGMAOyrGCFHiMc4hlo5jH/RTBP5zkUl4C8LjkKDnj9ogPgfwwYyW2Jy3nHx+khIYDrfldL1KhCqALTB1XDtbDgU8/3VXQpZVIqZrOUmiQsApgEfd1sQge1pIQLQdey8iiEQUItUBKv7Uv36Le0+Z2BsEyvGTPxIXvybEIh8SKCSerb/riDfamOfkbKNM4Oa3q7hzj6xid/DSIlBFvTPjomRb7cjE+6APxnE0HuFI+qyawBhd4ExK1LU3IBaZ2AO9JNcJzidiWVWj1ITtVIt6Aio+NjG5D0Y92XhvEKiJHIZJunpKQG/jFYAnt2DlvIcgxxJDBtVKhWyr6wcNteYAbt2CpUYcnphghQmkQqNF0tX+K8KMy5JtNWKCaImW9vxXvSWB/1b+KY5WxTcixlxaFT8W0D58Ae9B103kF2yMAAAAAElFTkSuQmCC"/>
                                                </div>
                                                <div class="text"><?php
                                                    echo $viewedCarProps["HORSE_POWER"]["VALUE"] ?> л. с.
                                                </div>
                                            </div>
                                            <div class="gearbox">
                                                <div class="icon"><img
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                                </div>
                                                <div class="text"><?php
                                                    echo $viewedCarProps["TRANSMISSION"]["VALUE"] ?></div>
                                            </div>
                                        </div>
                                        <div class="catalog-card__price">
                                            <div class="now"><?php
                                                echo number_format($viewedCarProps["PRICE"]["VALUE"], 0, ',', ' '); ?>
                                                &nbsp;₽
                                            </div>
                                            <div class="before"><?php
                                                echo number_format($viewedCarProps["PRICE"]["VALUE"], 0, ',', ' '); ?>
                                                &nbsp;₽
                                                <div class="red-line"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                        </div><?php
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
$notViewedAgain = true;

foreach ($viewed as $value) {
    $value = (int)$value;
    $carID = (int)$arResult["ID"];
    if ($carID == $value) {
        $notViewedAgain = false;
    }
}
if ($notViewedAgain) {
    $viewed[3] = $viewed[2];
    $viewed[2] = $viewed[1];
    $viewed[1] = $viewed[0];
    $viewed[0] = $arResult["ID"];
}

$serializedViewed = serialize($viewed);
setcookie("viewdcars", $serializedViewed, strtotime("+30 day"));
?>