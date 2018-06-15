<?php

/**
 * задаем параметры для страницы
 */

$pageParams->setPageParams( "id", "front" );
$pageParams->setPageParams( "title", "Задачи" );

$pageParams->setPageParams( "metaTitle", "ХардПлан. Задачи" );
$pageParams->setPageParams( "metaDescription", "ХардПлан. Планировщик задач Хардкода" );
$pageParams->setPageParams( "metaKeywords", "ХардПлан, планировщик задач, time-management, задачи, тех-поддержка" );



/**
 * поключаем шаблон страницы
 */
require_once( PATH_PUBLIC_PAGES . "/front.php" );