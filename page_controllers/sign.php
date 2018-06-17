<?php

/**
 * задаем параметры для страницы
 */

$pageParams->setPageParams( "id", "sign" );
$pageParams->setPageParams( "title", "Авторизация / Регистрация" );

$pageParams->setPageParams( "metaTitle", "ХардПлан. Авторизация и регистрация" );
$pageParams->setPageParams( "metaDescription", "ХардПлан. Страница авторизации и регистрации" );
$pageParams->setPageParams( "metaKeywords", "ХардПлан, авторизация, регистрация, тех-поддержка" );



/**
 * поключаем шаблон страницы
 */
require_once( PATH_PUBLIC_PAGES . "/sign.php" );