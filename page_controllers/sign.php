<?php

	/**
	 * Проверяем, подключено ли ядро.
	 */
	if ( IS_CORE_INC !== true )
		exit( "silence gold" );



	/**
	 * Задаем параметры для страницы.
	 */

	$pageParams->setPageParam( "id", "sign" );
	$pageParams->setPageParam( "title", "Авторизация / Регистрация" );

	$pageParams->setPageParam( "metaTitle", "ХардПлан. Авторизация и регистрация" );
	$pageParams->setPageParam( "metaDescription", "ХардПлан. Страница авторизации и регистрации" );
	$pageParams->setPageParam( "metaKeywords", "ХардПлан, авторизация, регистрация, тех-поддержка" );



	/**
	 * Поключаем шаблон страницы.
	 */
	require_once( PATH_PUBLIC_PAGES . "/sign.php" );