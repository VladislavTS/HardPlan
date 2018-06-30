<?php

	/**
	 * Проверяем, подключено ли ядро.
	 */
	if ( IS_CORE_INC !== true )
		exit( "silence gold" );



	/**
	 * Задаем параметры для страницы.
	 */

	$pageParams->setPageParam( "id", "cabinet" );
	$pageParams->setPageParam( "title", "Личный кабинет" );

	$pageParams->setPageParam( "metaTitle", "ХардПлан. Личный кабинет" );
	$pageParams->setPageParam( "metaDescription", "ХардПлан. Личный кабинет ХардПлана" );
	$pageParams->setPageParam( "metaKeywords", "ХардПлан, планировщик задач, time-management, личный кабинет, тех-поддержка" );



	/**
	 * Поключаем шаблон страницы.
	 */
	require_once( PATH_PUBLIC_PAGES . "/cabinet.php" );