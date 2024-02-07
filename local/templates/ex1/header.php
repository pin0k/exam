<?
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    IncludeTemplateLangFile(__FILE__);
    use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->ShowHead();?>

    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "./css/reset.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "./css/style.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "./css/owl.carousel.css");?>

    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "./js/jquery.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "./js/owl.carousel.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "./js/scripts.js");?>

    <link rel="icon" type="image/vnd.microsoft.icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico">
    <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico">
</head>

<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <!-- wrap -->
    <div class="wrap">
        <!-- header -->
        <header class="header">
            <div class="inner-wrap">
                <div class="logo-block"><a href="<?=SITE_DIR?>" class="logo">Мебельный магазин</a>
                </div>
                <div class="main-phone-block">
                    <?if(date("H") > 9 && date("H") < 18 ):?>
                    <a href="tel:84952128506" class="phone">8 (495) 212-85-06</a>
                    <?else:?>
                    <a href="mailto:store@store.ru" class="phone">store@store.ru</a>
                    <?endif;?>
                    <div class="shedule">время работы с 9-00 до 18-00</div>
                </div>
                <div class="actions-block">
                    <form action="/" class="main-frm-search">
                        <input type="text" placeholder="Поиск">
                        <button type="submit"></button>
                    </form>
                    <?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "demo", Array(
                        "FORGOT_PASSWORD_URL" => "/login/&forgot_password=yes",	// Страница забытого пароля
                            "PROFILE_URL" => "/login/user.php",	// Страница профиля
                            "REGISTER_URL" => "/login/?register=yes",	// Страница регистрации
                            "SHOW_ERRORS" => "N",	// Показывать ошибки
                        ),
                        false
                    );?>
                </div>
            </div>
        </header>
        <!-- /header -->
        <!-- nav -->
        <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "3",	// Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                    0 => "",
                ),
                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "Y",	// Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                "USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            ),
            false
        );?>
        <!-- /nav -->
        <!-- breadcrumbs -->
        <?if(!(CSite::InDir('/index.php'))):?>
        <div class="breadcrumbs-box">
            <div class="inner-wrap">
                <a href="">Главная</a>
                <a href="">Мебель</a>
                <span>Выставки и события</span>
            </div>
        </div>
        <?endif;?>
        <!-- /breadcrumbs -->
        <!-- page -->
        <div class="page">
            <!-- content box -->
            <div class="content-box">
                <!-- content -->
                <div class="content">
                    <div class="cnt">
                    <?if(!(CSite::InDir('/index.php'))):?>
                        <header>
                            <h1><?$APPLICATION->ShowTitle(false);?></h1>
                        </header>
                        <hr>
                    <?endif;?>