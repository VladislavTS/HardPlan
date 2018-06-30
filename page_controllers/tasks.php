<?php

/**
 * Проверяем, подключено ли ядро.
 */
if ( IS_CORE_INC !== true ) exit( "silence gold" );



/**
 * Задаем параметры для страницы.
 */

$pageParams->setPageParam( "id", "tasks" );
$pageParams->setPageParam( "title", "Задачи" );

$pageParams->setPageParam( "metaTitle", "ХардПлан. Задачи" );
$pageParams->setPageParam( "metaDescription", "ХардПлан. Планировщик задач Хардкода" );
$pageParams->setPageParam( "metaKeywords", "ХардПлан, планировщик задач, time-management, задачи, тех-поддержка" );



/**
 * Поключаем шаблон страницы.
 */
require_once( PATH_PUBLIC_PAGES . "/tasks.php" );