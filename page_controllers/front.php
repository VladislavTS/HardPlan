<?php

	/**
	 * Проверяем, подключено ли ядро.
	 */
	if ( IS_CORE_INC !== true )
		exit( "silence gold" );



	/**
	 * Определяем домашние страницы для
	 * разных типов пользователей.
	 */
	$userTypes_home = array(
		"god" => "personal",
		"super-manager" => "personal",
		"manager" => "tasks",
		"programmer" => "tasks",
		"client" => "tasks"
	);



	/**
	 * Подключаем контроллер нужной страницы.
	 */
	if ( !include_once( PATH_PAGE_CONTROLLERS . "/" . $userTypes_home[ $DB->getUserType( $DB_connect, $_COOKIE[ "user" ] ) ] . ".php" ) )
		$logger_route->error( "Контроллер для страницы cabinet не найден", array(
			"Path to controller" => PATH_PAGE_CONTROLLERS . "/cabinet.php",
			"Error path" => __FILE__
		) );