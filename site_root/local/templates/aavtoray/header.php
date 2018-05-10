<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<!DOCTYPE html>
<html>
<head><title>Заголовок</title>
    <meta name="description" content="auto"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/style.css"/>
    <? $APPLICATION->ShowHead(); ?>
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
</head>
<body>
<div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
</div>
<header class="container">
    <div class="row">
        <div class="logo"><img class="d-none d-md-block" src="img/logo.png"/><img class="d-md-none"
                                                                                  src="img/logo-mobile.png"/></div>
        <div class="menu-holder">
            <div class="menu-burger d-lg-none by-click-changable hide-main-on-set">
                <!--img(src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAOCAYAAAAi2ky3AAAAKklEQVQ4T2Nk0I76z0AFwEg9g6jgGpARjFQyZ1AaNBprhGJ3MEb/YIs1AHWgCSfyTtLzAAAAAElFTkSuQmCC')--></div>
            <nav class="menu-wrapper d-lg-flex">
                <div class="menu__item by-click-changable by-mouseleave-resetable">
                    <div class="link link-type-e with-submenu">Автомобили</div>
                    <div class="menu_submenu">
                        <div class="submenu__item">Автомобили с пробегом</div>
                        <div class="submenu__item">Новые автомобили</div>
                        <div class="submenu__item">Заявка на тест-драйв</div>
                        <div class="submenu__item">Продать свой автомобиль</div>
                        <div class="submenu__item">Обменять свой автомобиль</div>
                    </div>
                </div>
                <div class="menu__item">
                    <div class="link-type-e link">Сервис</div>
                </div>
                <div class="menu__item">
                    <div class="link-type-e link">Спецпредложения</div>
                </div>
                <div class="menu__item">
                    <div class="link-type-e link">О компании</div>
                </div>
            </nav>
        </div>
        <div class="tel">
            <div class="link-phone-in-head">
                <div class="text">+7&nbsp;(800)&nbsp;123-67-45</div>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABRUlEQVQ4T52UwVHDMBBF3xoSjpRAjoAzQ6gA0gG5EQ8z4ApSAikhHeBDRlfSASnBh/geOoACwIwslIxjybGtk8fSPu1q/1/BrjB6Ad4QVpz2Y9Lka7fX4kOKsxa2D0zp9cddoOKAWWwnqAZugQtnVbr8jZq0qBgNzGsDMmWepeGqzxBiMpU0ZBXHhHCagDw7glrDDHD4dE/++3EATMnUbZvM7FkrmzVwVwJIMGaz1P9bLQP0ZdlBi/sOhpEjyy6ysQVdPg44CVLg/KDGhEzFTesua+xq+kAg79XgfE3vbFKy4jCak/MK5b2qaK+jBcLMkdEWCeKiUVWp7WzqdoFfm/oebdWB48IC6reVP1P/cwqrep+asbZwNMoH/T5ufNN97eey8N3I+DjQBhoF6Gzdo+5/kDQHWnDhqh/9FCOQG+ATmNup9Af7fGNEO6/JSQAAAABJRU5ErkJggg=="/>
            </div>
        </div>
    </div>
</header>