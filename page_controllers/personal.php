<?php

	/**
	 * Проверяем, подключено ли ядро.
	 */
	if ( IS_CORE_INC !== true )
		exit( "silence gold" );



	/**
	 * Задаем параметры для страницы.
	 */

	$pageParams->setPageParam( "id", "personal" );
	$pageParams->setPageParam( "title", "Мои коты" );

	$pageParams->setPageParam( "metaTitle", "ХардПлан. Коты" );
	$pageParams->setPageParam( "metaDescription", "ХардПлан. Сотрудники Хардкода" );
	$pageParams->setPageParam( "metaKeywords", "ХардПлан, сотрудники, тех-поддержка" );



	/**
	 * Поключаем шаблон страницы.
	 */
	require_once( PATH_PUBLIC_PAGES . "/personal.php" );