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

// I'm very ashamed of this code. But I have not chance and time to do any other;
if ($_GET["SORT_BY"]) {
    $sortBy = explode('_', strtoupper($_GET["SORT_BY"]));
    if ($sortBy[0] == "P") {
        $arParams["SORT_BY1"] = "property_PRICE";
        $arParams["SORT_BY2"] = "property_YEAR";
        $arParams["SORT_ORDER1"] = $sortBy[1] == "A" ? "ASC" : "DESC";
        $arParams["SORT_ORDER2"] = $sortBy[2] == "A" ? "ASC" : "DESC";
        $sortByYearClass = " noactive ";
        $sortByPriceClass = " active ";
    } else {
        $arParams["SORT_BY2"] = "property_PRICE";
        $arParams["SORT_BY1"] = "property_YEAR";
        $arParams["SORT_ORDER2"] = $sortBy[1] == "A" ? "ASC" : "DESC";
        $arParams["SORT_ORDER1"] = $sortBy[2] == "A" ? "ASC" : "DESC";
        $sortByYearClass = " active ";
        $sortByPriceClass = " noactive ";
    }
    // kill me please, Imma bitrix-developer, I write bitrix-like code
    $_SESSION['sortByYearGetParam'] = "y_" . $sortBy[1] . "_" . ($sortBy[2] == "A" ? "D" : "A");
    $_SESSION['sortByPriceGetParam'] = "p_" . ($sortBy[1] == "A" ? "D" : "A") . "_" . $sortBy[2];
    $_SESSION['sortByYearClass'] = ($sortBy[2] == "A" ? "" : "set ") . $sortByYearClass;
    $_SESSION['sortByPriceClass'] = ($sortBy[1] == "A" ? "" : "set ") . $sortByPriceClass;
} else {
    $arParams["SORT_BY1"] = "property_PRICE";
    $arParams["SORT_ORDER1"] = "ASC";
    $arParams["SORT_BY2"] = "property_YEAR";
    $arParams["SORT_ORDER2"] = "ASC";
    $_SESSION['sortByYearGetParam'] = "y_a_a";
    $_SESSION['sortByPriceGetParam'] = "p_a_a";
}


?>

<? if ($arParams["USE_RSS"] == "Y"): ?>
    <?
    if (method_exists($APPLICATION, 'addheadstring'))
        $APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="' . $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["rss"] . '" href="' . $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["rss"] . '" />');
    ?>
    <a href="<?= $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["rss"] ?>" title="rss" target="_self"><img alt="RSS"
                                                                                                             src="<?= $templateFolder ?>/images/gif-light/feed-icon-16x16.gif"
                                                                                                             border="0"
                                                                                                             align="right"/></a>
<? endif ?>

<? if ($arParams["USE_SEARCH"] == "Y"): ?>
    <?= GetMessage("SEARCH_LABEL") ?><? $APPLICATION->IncludeComponent(
        "bitrix:search.form",
        "flat",
        Array(
            "PAGE" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["search"]
        ),
        $component
    ); ?>
    <br/>
<? endif ?>

<main class="catalog">
    <div class="container">
        <div class="row">

            <? if ($arParams["USE_FILTER"] == "Y"): ?>
                <aside class="catalog-aside col-12 col-lg-3">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.smart.filter",
                        "catalog_filter",
                        Array(
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "DISPLAY_ELEMENT_COUNT" => "Y",
                            "FILTER_NAME" => "arrFilter",
                            "IBLOCK_ID" => "2",
                            "IBLOCK_TYPE" => "catalog",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "POPUP_POSITION" => "left",
                            "SAVE_IN_SESSION" => "N",
                            "SECTION_CODE" => "",
                            "SECTION_DESCRIPTION" => "-",
                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                            "SECTION_TITLE" => "-",
                            "SEF_MODE" => "N",
                            "TEMPLATE_THEME" => "blue",
                            "XML_EXPORT" => "N",

                        )
                    ); ?>
                </aside>
            <? endif ?>

            <div class="catalog-container col-12 col-lg-9 unSeter" data-entrustby="click"
                 data-entrustto=".catalog-aside">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "",
                    Array(
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                        "SORT_BY1" => $arParams["SORT_BY1"],
                        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                        "SORT_BY2" => $arParams["SORT_BY2"],
                        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
                        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                        "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
                        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                        "SET_TITLE" => $arParams["SET_TITLE"],
                        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                        "MESSAGE_404" => $arParams["MESSAGE_404"],
                        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                        "SHOW_404" => $arParams["SHOW_404"],
                        "FILE_404" => $arParams["FILE_404"],
                        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                        "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                        "FILTER_NAME" => $arParams["FILTER_NAME"],
                        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                        "CHECK_DATES" => $arParams["CHECK_DATES"],
                    ),
                    $component
                ); ?>
            </div>
        </div>
    </div>
</main>


<section class="noFoundBlock">
    <div class="container">
        <div class="video-bg"><img src="/assets/img/noFoundBlock__video-bg.png"/></div>
        <div class="row">
            <div class="content-holder col-lg-6 m-lg-6"><h1>Не нашли нужный автомобиль?</h1>
                <h2>Мы привезем его под заказ!</h2>
                <div class="buttons">
                    <div class="a button-type-g">Заказать автомобиль</div>
                    <div class="b button-tttop"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="followUsBlock">
    <div class="container">
        <div class="row">
            <div class="right col-12 col-lg-5 offset-lg-1"><h1>Новости! Скидки!<br class="d-lg-none"/>Акции!</h1>
                <h2>Подпишитесь на нашу рассылку в Telegram</h2>
                <div class="subscribe-button button-type-j">Подписаться</div>
            </div>
            <div class="left col-12 col-lg-6"><img class="a320" src="/assets/img/chat1.png"/><img class="b750"
                                                                                                  src="/assets/img/chat2.png"/><img
                        class="c992" src="/assets/img/chat3.png"/></div>
        </div>
    </div>
</div>
