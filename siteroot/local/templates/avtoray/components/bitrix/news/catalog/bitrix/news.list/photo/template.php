<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>
	<div class="news-list">
		<b><?=$arResult["NAME"]?></b>
		<table cellpadding="5" cellspacing="0" border="0">
		<tr valign="center">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<td align="center">
			<?if(is_array($arItem["PREVIEW_PICTURE"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a>
			<?else:?>
				&nbsp;
			<?endif?>
			</td>
		<?endforeach;?>
		</tr>
		<tr valign="top">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<td align="center">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
			</td>
		<?endforeach;?>
		</tr>
		</table>
	</div>
<?endif?>
<div class="catalog-container col-12 col-lg-9 unSeter" data-entrustby="click"
     data-entrustto=".catalog-aside">
    <div class="catalog-presets-filter filter-container container">
        <header class="row by-click-changable"><p class="title col-6">Готовые подборки<span
                        class="d-none d-md-inline">по популярным категориям</span></p>
            <div class="collapser col-6">
                <div class="link-type-c by-click-changable">collapse</div>
            </div>
        </header>
        <section class="main row">
            <div class="filter-button">
                <div class="button-type-a by-click-changable">filter with a long name
                    <div class="close-x"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                    </div>
                </div>
            </div>
            <div class="filter-button">
                <div class="button-type-a by-click-changable">filter
                    <div class="close-x"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                    </div>
                </div>
            </div>
            <div class="filter-button">
                <div class="button-type-a by-click-changable">filter
                    <div class="close-x"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                    </div>
                </div>
            </div>
            <div class="filter-button">
                <div class="button-type-a by-click-changable">filter with a long name
                    <div class="close-x"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                    </div>
                </div>
            </div>
            <div class="filter-button">
                <div class="button-type-a by-click-changable">filter with a very very long name 2018
                    <div class="close-x"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="catalog-sort filter-container">
        <div class="sorters">
            <div class="sorters-title">Сортировать:</div>
            <div class="sorter link-type-d by-click-changable">sort by it</div>
            <div class="sorter link-type-d by-click-changable">sort by it</div>
        </div>
        <div class="filter-menu-button setToggler" data-entrustby="click" data-entrustto=".catalog-aside">
            <div class="text">Подобрать по параметрам</div>
            <div class="circled-image"><img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAm0lEQVQ4T42SsRHCMBAE90ic0gnuAEqwu2GIlOFuoATogFJISfyMJGaYsSy9L32d5n7/RFSwPR9uwAl40DES9E6zisTFAsYBQ0waONsdYRgv3zjTp8dXjckYtfOM/6jRcASedAx+1Fae5o6esQIuw5mxBr5+DVw2tlQBJy/p78YFON9YLcBysLFFJRyxCmP5fwlnY4vKHXNUt0VfEVZb3Nknrw8AAAAASUVORK5CYII="/>
            </div>
        </div>
    </div>
    <div class="catalog-cards">
        <article class="catalog-card">
            <div class="catalog-card__border"></div>
            <div class="catalog-card__content">
                <div class="to-left">
                    <div class="catalog-card__images"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                        <div class="picker">
                            <div class="dot active"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
                <div class="to-right">
                    <div class="catalog-card__title"><h1>Renault Captur</h1>
                        <div class="added-sets">+ доп. оборудование</div>
                    </div>
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
                        <div class="before">1&nbsp;995&nbsp;550&nbsp;₽</div>
                    </div>
                    <div class="catalog-card__on-credit button-type-e">В кредит от 2 605 ₽/месяц</div>
                </div>
            </div>
        </article>
        <article class="catalog-card">
            <div class="catalog-card__border"></div>
            <div class="catalog-card__content">
                <div class="to-left">
                    <div class="catalog-card__images"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                        <div class="picker">
                            <div class="dot active"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
                <div class="to-right">
                    <div class="catalog-card__title"><h1>Renault Captur</h1>
                        <div class="added-sets">+ доп. оборудование</div>
                    </div>
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
                        <div class="before">1&nbsp;995&nbsp;550&nbsp;₽</div>
                    </div>
                    <div class="catalog-card__on-credit button-type-e">В кредит от 2 605 ₽/месяц</div>
                </div>
            </div>
        </article>
        <article class="catalog-card">
            <div class="catalog-card__border"></div>
            <div class="catalog-card__content">
                <div class="to-left">
                    <div class="catalog-card__images"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQYV2PYd+LqfwAH/gNbnGrA2wAAAABJRU5ErkJggg=="/>
                        <div class="picker">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot active"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
                <div class="to-right">
                    <div class="catalog-card__title"><h1>Renault Captur</h1>
                        <div class="added-sets">+ доп. оборудование</div>
                    </div>
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
                        <div class="before">1&nbsp;995&nbsp;550&nbsp;₽</div>
                    </div>
                    <div class="catalog-card__on-credit button-type-e">В кредит от 2 605 ₽/месяц</div>
                </div>
            </div>
        </article>
    </div>
    <div class="catalog-pagination">
        <div class="catalog-pagination__buttons">
            <div class="button-type-f">1</div>
            <div class="button-type-f set">2</div>
            <div class="button-type-f">3</div>
            <div class="button-type-f">4</div>
            <div class="button-type-f">5</div>
            <div class="button-type-f">...</div>
            <div class="button-type-f">999</div>
        </div>
    </div>
</div>
