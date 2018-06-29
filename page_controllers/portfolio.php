<?php

/**
 * задаем параметры для страницы
 */

$pageParams->setPageParams( "id", "portfolio" );
$pageParams->setPageParams( "title", "Личный кабинет" );

$pageParams->setPageParams( "metaTitle", "ХардПлан. Личный кабинет" );
$pageParams->setPageParams( "metaDescription", "ХардПлан. Личный кабинет ХардПлана" );
$pageParams->setPageParams( "metaKeywords", "ХардПлан, планировщик задач, time-management, личный кабинет, тех-поддержка" );



/**
 * поключаем шаблон страницы
 */
require_once( PATH_PUBLIC_PAGES . "/portfolio.php" );