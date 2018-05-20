<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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



    <form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">

            <?foreach($arResult["HIDDEN"] as $arItem):?>
                <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
            <?endforeach;

            //not prices
            foreach($arResult["ITEMS"] as $key=>$arItem)
            {
                if ($arItem["DISPLAY_TYPE"] == "A"
                    && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)) continue;

                if ($arItem["ID"] == 136) {
                    ?>
                <article class="filter-container container">

                    <header class="row by-click-changable"><p class="title col-6">
                            <?=$arItem["NAME"]?>
                        </p>
                        <div class="collapser col-6">
                            <div class="link-type-c by-click-changable">collapse</div>
                        </div>
                    </header>

                    <section class="main row">
                    <div class="col-6 filter-button">
                        <div class="button-type-a by-click-changable <? echo $ar["CHECKED"] == 'Y' ? 'set' : '' ?>">
                            С&nbsp;пробегом   <!--span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span-->
                            <div class="close-x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/></div>
                            <input
                                    type="checkbox"
                                    value="1"
                                    name="arrFilter_136_MIN"
                                    id="<? echo $ar["CONTROL_ID"] ?>"
                                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                    onclick="smartFilter.click(this)"
                            />
                        </div>
                    </div>
                    <div class="col-6 filter-button">
                        <div class="button-type-a by-click-changable <? echo $ar["CHECKED"] == 'Y' ? 'set' : '' ?>">
                            Без&nbsp;пробега    <!--span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span-->
                            <div class="close-x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/></div>
                            <input
                                    type="checkbox"
                                    value="1"
                                    name="arrFilter_136_MAX"
                                    id="0"
                                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                    onclick="smartFilter.click(this)"
                            />
                        </div>
                    </div>
                    </section>
                </article>
                    <?php
                    continue;
                }

                ?>


                <article class="filter-container container">

                    <header class="row by-click-changable"><p class="title col-6">
                            <?=$arItem["NAME"]?>
                        </p>
                        <div class="collapser col-6">
                            <div class="link-type-c by-click-changable">collapse</div>
                        </div>
                    </header>

                    <section class="main row"><?
                            $arCur = current($arItem["VALUES"]);
                            switch ($arItem["DISPLAY_TYPE"])
                            {
                            case "A":
                                $filterMinimum = $arItem["VALUES"]["MIN"]["VALUE"];
                                $filterMaximum = $arItem["VALUES"]["MAX"]["VALUE"];
                                $curMinimum =  $arItem["VALUES"]["MIN"]["HTML_VALUE"] ? $arItem["VALUES"]["MIN"]["HTML_VALUE"] : $filterMinimum;
                                $curMaximum =  $arItem["VALUES"]["MAX"]["HTML_VALUE"] ? $arItem["VALUES"]["MAX"]["HTML_VALUE"] : $filterMaximum;
                                ?>
                                <div class="row range-type-a col-12">
                                    <div class="input-type-a col-6">
                                        <div class="wrapper">
                                            <div class="text">от</div>
                                            <input class="min"
                                                   name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                                   id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                                                   value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                                                   placeholder="0" pattern="[0-9]{1,20}"/></div>
                                    </div>
                                    <div class="input-type-a col-6">
                                        <div class="wrapper">
                                            <div class="text">до</div>
                                            <input class="max"
                                                   name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                                   id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                                                   value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                                                   placeholder="0" pattern="[0-9]{1,20}"/></div>
                                    </div>
                                    <div class="range col-12">
                                        <div class="slider"
                                             data-initmin = "<?php echo $curMinimum;?>"
                                             data-initmax = "<?php echo $curMaximum;?>"
                                             data-min="<?php echo $filterMinimum;?>"
                                             data-max="<?php echo $filterMaximum;?>">
                                        </div>
                                    </div>
                                </div>
                            <?
                            break;
                            case "B"://NUMBERS
                            ?>
                                <div class="col-6 input-type-a">
                                    <div class="wrapper">
                                        <div class="text">от</div>
                                        <input
                                                class="min-price"
                                                type="text"
                                                name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                                id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                                                value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                                                size="5"
                                                onkeyup="smartFilter.keyup(this)"
                                        /></div>
                                </div>
                                <div class="col-6 input-type-a">
                                    <div class="wrapper">
                                        <div class="text">до</div>
                                        <input
                                                class="max-price"
                                                type="text"
                                                name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                                id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                                                value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                                                size="5"
                                                onkeyup="smartFilter.keyup(this)"
                                        /></div>
                                </div>
                            <?
                            break;
                            default://CHECKBOXES
                            ?>
                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                                <div class="col-6 filter-button">
                                    <div class="button-type-a by-click-changable <? echo $ar["CHECKED"] == 'Y' ? 'set' : '' ?>">
                                        <?=$ar["VALUE"];?>     <!--span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span-->
                                        <div class="close-x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/></div>
                                        <input
                                                type="checkbox"
                                                value="<? echo $ar["HTML_VALUE"] ?>"
                                                name="<? echo $ar["CONTROL_NAME"] ?>"
                                                id="<? echo $ar["CONTROL_ID"] ?>"
                                            <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                onclick="smartFilter.click(this)"
                                        />
                                    </div>
                                </div>
                            <?endforeach;?>
                                <?
                            }
                            ?>

                    </section>

                </article>
                <?
            }
            ?>

            <article class="filter-container container filter-buttons">
                <div class="main row">
                    <div class="apply col-6">
                        <button class="bx_filter_search_button button-type-b" type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>">
                            <?=GetMessage("CT_BCSF_SET_FILTER")?>
                        </button>
                    </div>
                    <div class="clear col-6">
                        <button class="bx_filter_search_reset button-type-c" type="submit" id="del_filter" name="del_filter" value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>">
                            <?=GetMessage("CT_BCSF_DEL_FILTER")?>
                        </button>
                    </div>
                </div>
            </article>
        </form>

<div class="action-buttons">
    <div class="action-buttons__button button-type-d">Продать свой автомобиль</div>
    <div class="action-buttons__button button-type-d">Заявка на тест-драйв</div>
    <div class="action-buttons__button button-type-d">Trade-in</div>
    <div class="action-buttons__button button-type-d">Страхование</div>
</div>