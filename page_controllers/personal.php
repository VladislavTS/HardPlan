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
	$pageParams->setPageParam( "title", "Сотрудники" );

	$pageParams->setPageParam( "metaTitle", "ХардПлан. Сотрудники" );
	$pageParams->setPageParam(
		"metaDescription",
		"Бесконечно долго можно смотреть на 3 вещи: огонь, воду, и на то как хардкодеры 
		трудятся в поте лица."
	);
	$pageParams->setPageParam( "metaKeywords", "ХардПлан, сотрудники, тех-поддержка" );



	/**
	 * Поключаем шаблон страницы.
	 */
	require_once( PATH_PUBLIC_PAGES . "/personal.php" );