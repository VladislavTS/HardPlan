<?php

	session_start();

	/**
	 * Создаем куку при успешной авторизации.
	 */
	if ( !$_COOKIE[ "user" ] ) {

		if ( $_SESSION[ "user" ] ) {
			setcookie( "user", $_SESSION[ "user" ], time() + 60 * 60 * 24 * 30 * 12 );
		}

	}



	/**
	 * Используется для проверки подключения ядра в файлах.
	 * Пример: if ( IS_CORE_INC !== true ) exit( "silence gold" );
	 */
	define( "IS_CORE_INC", true );



	/**
	 * Шаблон стандартного сообщения для фатальной ошибки.
	 * Пример: exit( ERROR_MESSAGE );
	 */
	define( "ERROR_MESSAGE", "
		<div style=\"
			width:100%; height:100%; display:flex; justify-content:center; align-items:center; text-align:center;
		\">
			На сервисе ведутся технические работы.<br>
			В скором времени доступ к проекту будет восстановлен.
		</div>
	" );



	/**
	 * Подключаем автозагрузку пакетов composer'а.
	 */
	if ( file_exists( __DIR__ . "/vendor/autoload.php" ) ) {

		require_once( __DIR__ . "/vendor/autoload.php" );

	}
	else {

		exit( ERROR_MESSAGE );

	}



	/**
	 * Подключаем основные константы / конфигурации.
	 */
	if ( file_exists( __DIR__ . "/configs.php" ) ) {

		require_once( __DIR__ . "/configs.php" );

	}
	else {

		exit( ERROR_MESSAGE );

	}



	/**
	 * Подключаем функционал для работы с логами.
	 */
	if ( file_exists( PATH_FUNCTIONS . "/Log.php" ) ) {

		require_once( PATH_FUNCTIONS . "/Log.php" );

	}
	else {

		exit( ERROR_MESSAGE );

	}



	/**
	 * Подключаем компоненты.
	 */

	/**
	 * Работа с базой данных.
	 */
	if ( file_exists( PATH_ROOT . "/db_connect.php" ) ) {

		require_once( PATH_ROOT . "/db_connect.php" );

	}
	else {

		$logger_core->error( "Не удалось полключить компонент для работы с базой данных", array(
			"Path to component" => PATH_ROOT . "/db_connect.php",
			"Error path" => __FILE__
		) );
		exit( ERROR_MESSAGE );

	}

	/**
	 * Параметры страницы.
	 */
	if ( file_exists( PATH_COMPONENTS . "/PageParams.class.php" ) ) {

		require_once( PATH_COMPONENTS . "/PageParams.class.php" );

	}
	else {

		$logger_core->error( "Не удалось полключить компонент для указания параметров страницы", array(
			"Path to component" => PATH_COMPONENTS . "/PageParams.class.php",
			"Error path" => __FILE__
		) );
		exit( ERROR_MESSAGE );

	}



	/**
	 * Подключаем функционал для работы с маршрутизацией.
	 */
	if ( file_exists( PATH_FUNCTIONS . "/Routing.php" ) ) {

		require_once( PATH_FUNCTIONS . "/Routing.php" );

	}
	else {

		$logger_core->error( "Не удалось полключить функционал для работы с маршрутизацией", array(
			"Path to component" => PATH_FUNCTIONS . "/Routing.php",
			"Error path" => __FILE__
		) );
		exit( ERROR_MESSAGE );

	}