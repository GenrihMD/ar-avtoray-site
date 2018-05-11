<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>
	<table class="data-table" cellspacing="0" cellpadding="2">
	<thead>
		<tr>
			<td colspan="2" align="center"><?=GetMessage("IBLOCK_FILTER_TITLE")?></td>
		</tr>
	</thead>
	<tbody>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
				<tr>
					<td valign="top"><?=$arItem["NAME"]?>:</td>
					<td valign="top"><?=$arItem["INPUT"]?></td>
				</tr>
			<?endif?>
		<?endforeach;?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2">
				<input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" /></td>
		</tr>
	</tfoot>
	</table>
</form-->
<aside class="catalog-aside col-12 col-lg-3">
    <div class="filters-container">
        <article class="filter-container container filter-header setToggler" data-entrustby="click"
                 data-entrustto=".catalog-aside">
            <div class="main row"><p class="text">Закрыть фильтр</p>
                <div class="close-button"><img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAA3ElEQVQ4T42Syw2CQBRFzyQObO0DiTTgrwPdsrIErURLsAPtQNAGMFiIW8AEM3yUAYb4lpOcue/dewWO70F+QNobotOLofG2Y7LkDGIvcPwAWAAR0loZ4QJKr4AHhILylwDE1AhrUP5A2ktRbDYE90BqqxI0wer9u16pVJ/yA7twXH3pgg6pdx2s4XdyJxeTAhT5k5E9a5vWD2bpDXArxRhpzYfBphFKSU2p3ImqZU6dU3VTYU5/VI04WlDdIkNUVQEM0EBUjcp1LddqqyuHClTdOyKt9X8lTy/A7gNd3JZDnLduXQAAAABJRU5ErkJggg=="/>
                </div>
            </div>
        </article>
        <article class="filter-container container">
            <header class="row by-click-changable"><p class="title col-6">title</p>
                <div class="collapser col-6">
                    <div class="link-type-c by-click-changable">collapse</div>
                </div>
            </header>
            <section class="main row">
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-12 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <article class="filter-container container">
            <header class="row by-click-changable"><p class="title col-6">title</p>
                <div class="collapser col-6">
                    <div class="link-type-c by-click-changable">collapse</div>
                </div>
            </header>
            <section class="main row">
                <div class="col-6 input-type-a">
                    <div class="wrapper">
                        <div class="text">от</div>
                        <input placeholder="0" pattern="[0-9]{1,5}"/></div>
                </div>
                <div class="col-6 input-type-a">
                    <div class="wrapper">
                        <div class="text">до</div>
                        <input placeholder="0" pattern="[0-9]{1,5}"/></div>
                </div>
            </section>
        </article>
        <article class="filter-container container">
            <header class="row by-click-changable"><p class="title col-6">title</p>
                <div class="collapser col-6">
                    <div class="link-type-c by-click-changable">collapse</div>
                </div>
            </header>
            <section class="main row">
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
                <div class="col-6 filter-button">
                    <div class="button-type-a by-click-changable">filter
                        <div class="close-x"><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <article class="filter-container container filter-buttons">
            <div class="main row">
                <div class="apply col-6">
                    <div class="button-type-b">применить</div>
                </div>
                <div class="clear col-6">
                    <div class="button-type-c">очистить</div>
                </div>
            </div>
        </article>
    </div>
    <div class="action-buttons">
        <div class="action-buttons__button button-type-d">Продать свой автомобиль</div>
        <div class="action-buttons__button button-type-d">Заявка на тест-драйв</div>
        <div class="action-buttons__button button-type-d">Trade-in</div>
        <div class="action-buttons__button button-type-d">Страхование</div>
    </div>
</aside>

