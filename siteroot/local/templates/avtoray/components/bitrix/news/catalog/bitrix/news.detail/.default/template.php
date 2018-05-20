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
$this->setFrameMode(true);
?>
<?php
$props = $arResult["DISPLAY_PROPERTIES"];


$dealerLink = $props['CAR_DEALER'];
$dealerLinkValue = (int)$dealerLink['VALUE'];
$dealerElementID = $dealerLinkValue;
//$dealerElementID = (int)$dealerLink['ID'];
//$dealerIBlockID = (int)$dealerIBlock['IBLOCK_ID'];


$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("ID" => $dealerElementID,"ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

$dealer_props = $res->GetNextElement()->GetProperties();
var_dump($PROPS);

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
//    'dealer_' => '',
//    'dealer_' => '',
//    'dealer_' => '',
//    '' => '',
];

$t['price'] = number_format($t['price'], 0, ',', ' ');
$t['run'] = $t['run'] > 0 ? $t['run'] . ' ' . $t['run'] : 'без пробега';
$t['additional_info_exterior'] = str_replace('•', '<br>•', $t['additional_info_exterior']);
$t['additional_info_interior'] = str_replace('•', '<br>•', $t['additional_info_interior']);
$t['additional_info_safety'] = str_replace('•', '<br>•', $t['additional_info_safety']);
$t['additional_info_comfort'] = str_replace('•', '<br>•', $t['additional_info_comfort']);
$t['additional_info_warranty'] = str_replace('•', '<br>•', $t['additional_info_warranty']);

?>
<main class="catalog-detail">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="slider">
                    <div class="slides">
                        <div class="slide"><img src="<?php echo $t['image']; ?>"/></div>
                    </div>
                </div>
                <div class="action-buttons row">
                    <div class="action-buttons__button col-12 col-md-4">
                        <div class="button-type-d">Хочу приобрести</div>
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
                <div class="right-panel"><h1 class="name"><?php
                        echo $t['mark'] . ' ' . $t['model'] ?></h1>
                    <div class="features row">
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="feature">
                                <div class="icon"></div>
                                <div class="faeture__name"></div>
                                <div class="feature__value"></div>
                            </div>
                        </div>
                    </div>
                    <div class="desctiption">

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row by-click-changable">
                                <div class="title col-6"><h2>Внешний вид</h2></div>
                            </header>
                            <section class="main row" style="padding: 0 15px;">
                                <main class="row">
                                    <p><?php echo $t['additional_info_exterior'] ?></p>
                                </main>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row by-click-changable">
                                <div class="title col-6"><h2>Внутрення отделка</h2></div>
                            </header>
                            <section class="main row" style="padding: 0 15px;">
                                <main class="row">
                                    <p><?php echo $t['additional_info_interior'] ?></p>
                                </main>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row by-click-changable">
                                <div class="title col-6"><h2>Безопасность</h2></div>
                            </header>
                            <section class="main row" style="padding: 0 15px;">
                                <main class="row">
                                    <p><?php echo $t['additional_info_safety'] ?></p>
                                </main>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row by-click-changable">
                                <div class="title col-6"><h2>Комфорт</h2></div>
                            </header>
                            <section class="main row" style="padding: 0 15px;">
                                <main class="row">
                                    <p><?php echo $t['additional_info_comfort'] ?></p>
                                </main>
                        </div>

                        <div class="catalog-presets-filter filter-container container"
                             style="border: none; cursor: pointer">
                            <header class="row by-click-changable">
                                <div class="title col-6"><h2>Дополнительно</h2></div>
                            </header>
                            <section class="main row" style="padding: 0 15px;">
                                <main class="row">
                                    <p><?php echo $t['additional_info_warranty'] ?></p>
                                </main>
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
            </div>
        </div>
    </div>
</main>

<section class="dealer-info">
    <div class="container">
        <div class="row"><h1>Данный автомобиль можно приобрести в салоне Авторай-Эксперт</h1>
            <div class="info-holder col-12">
                <div class="row">
                    <div class="info col-12 col-md-5 col-lg-3"><h2>Авторай-Эксперт</h2>
                        <h3>Время работы:</h3>
                        <p>ежедневно c 8:00 до 20:00</p>
                        <h3>Адрес:</h3>
                        <p><?php echo $t['dealer_address']?></p>
                        <h3>Телефон:</h3>
                        <p><?php echo $t['dealer_phonenumber']?></p>
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
                <div class="col-12 col-md-6 col-lg-3">
                    <article class="catalog-card">
                        <div class="catalog-card__content">
                            <div class="to-left">
                                <div class="catalog-card__images"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                                </div>
                            </div>
                            <div class="to-right">
                                <div class="catalog-card__title"><h1>Renault Captur</h1></div>
                                <div class="catalog-card__options">
                                    <div class="year">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                        </div>
                                        <div class="text">2017</div>
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
                                        <div class="text">249 л. с.</div>
                                    </div>
                                    <div class="gearbox">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                        </div>
                                        <div class="text">механика</div>
                                    </div>
                                </div>
                                <div class="catalog-card__price">
                                    <div class="now">1&nbsp;669&nbsp;000&nbsp;₽</div>
                                    <div class="before">1&nbsp;995&nbsp;550&nbsp;₽
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <article class="catalog-card">
                        <div class="catalog-card__content">
                            <div class="to-left">
                                <div class="catalog-card__images"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                                </div>
                            </div>
                            <div class="to-right">
                                <div class="catalog-card__title"><h1>Renault Captur</h1></div>
                                <div class="catalog-card__options">
                                    <div class="year">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                        </div>
                                        <div class="text">2017</div>
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
                                        <div class="text">249 л. с.</div>
                                    </div>
                                    <div class="gearbox">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                        </div>
                                        <div class="text">механика</div>
                                    </div>
                                </div>
                                <div class="catalog-card__price">
                                    <div class="now">1&nbsp;669&nbsp;000&nbsp;₽</div>
                                    <div class="before">1&nbsp;995&nbsp;550&nbsp;₽
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <article class="catalog-card">
                        <div class="catalog-card__content">
                            <div class="to-left">
                                <div class="catalog-card__images"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                                </div>
                            </div>
                            <div class="to-right">
                                <div class="catalog-card__title"><h1>Renault Captur</h1></div>
                                <div class="catalog-card__options">
                                    <div class="year">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                        </div>
                                        <div class="text">2017</div>
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
                                        <div class="text">249 л. с.</div>
                                    </div>
                                    <div class="gearbox">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                        </div>
                                        <div class="text">механика</div>
                                    </div>
                                </div>
                                <div class="catalog-card__price">
                                    <div class="now">1&nbsp;669&nbsp;000&nbsp;₽</div>
                                    <div class="before">1&nbsp;995&nbsp;550&nbsp;₽
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="you-viewed">
    <div class="container">
        <div class="row"><h1 class="col-12">Автомобили, которые Вы недавно смотрели</h1>
            <div class="cards row">
                <div class="col-12 col-md-6 col-lg-3">
                    <article class="catalog-card">
                        <div class="catalog-card__content">
                            <div class="to-left">
                                <div class="catalog-card__images"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                                </div>
                            </div>
                            <div class="to-right">
                                <div class="catalog-card__title"><h1>Renault Captur</h1></div>
                                <div class="catalog-card__options">
                                    <div class="year">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                        </div>
                                        <div class="text">2017</div>
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
                                        <div class="text">249 л. с.</div>
                                    </div>
                                    <div class="gearbox">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                        </div>
                                        <div class="text">механика</div>
                                    </div>
                                </div>
                                <div class="catalog-card__price">
                                    <div class="now">1&nbsp;669&nbsp;000&nbsp;₽</div>
                                    <div class="before">1&nbsp;995&nbsp;550&nbsp;₽
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <article class="catalog-card">
                        <div class="catalog-card__content">
                            <div class="to-left">
                                <div class="catalog-card__images"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                                </div>
                            </div>
                            <div class="to-right">
                                <div class="catalog-card__title"><h1>Renault Captur</h1></div>
                                <div class="catalog-card__options">
                                    <div class="year">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                        </div>
                                        <div class="text">2017</div>
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
                                        <div class="text">249 л. с.</div>
                                    </div>
                                    <div class="gearbox">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                        </div>
                                        <div class="text">механика</div>
                                    </div>
                                </div>
                                <div class="catalog-card__price">
                                    <div class="now">1&nbsp;669&nbsp;000&nbsp;₽</div>
                                    <div class="before">1&nbsp;995&nbsp;550&nbsp;₽
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <article class="catalog-card">
                        <div class="catalog-card__content">
                            <div class="to-left">
                                <div class="catalog-card__images"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                                </div>
                            </div>
                            <div class="to-right">
                                <div class="catalog-card__title"><h1>Renault Captur</h1></div>
                                <div class="catalog-card__options">
                                    <div class="year">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAdklEQVQ4T2NkQAL7Tly9wMDA8N/JQtsQWRydjU0dI5pB/0F8JwttFHEsBmGoY4Saro/PBUTIXQAZBDadUjCIDSIUwLi8DgsauNeobhDMBpjBxPIxXESsRnSLaOc1UtMTzsCmmteoZhDVvEaxQaQagK6eWsXIRQBFraFU9YcpIgAAAABJRU5ErkJggg=="/>
                                        </div>
                                        <div class="text">2017</div>
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
                                        <div class="text">249 л. с.</div>
                                    </div>
                                    <div class="gearbox">
                                        <div class="icon"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAzElEQVQ4T7VTSw6CMBScxwU8grpuTHBjyk7qReBkehHBHcSNEtM93sATUNMGEixF649NX6dhOvM6j/LislYUbAGAVJPG0eKga1+cslLWAKb6JwC14GyuC1/cJrgKzmYOglGc8qMMVYOTsRBgGa/Y2VjwxKm9TelVcGb23ZeV8iX+P4J9IRMimNdRCukmYjuXsgcFffk+tbb8DUElOAtHe/DMQl/dR038LYFvYLqA2c19exZcBDcAk/agn3knPiBox9aEhFSTWOM8wG2CO4wPw63RQ3xcAAAAAElFTkSuQmCC"/>
                                        </div>
                                        <div class="text">механика</div>
                                    </div>
                                </div>
                                <div class="catalog-card__price">
                                    <div class="now">1&nbsp;669&nbsp;000&nbsp;₽</div>
                                    <div class="before">1&nbsp;995&nbsp;550&nbsp;₽
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>