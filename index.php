<?php

/**
 * подключаем автозагрузку
 * пакетов composer'а
 */
if ( file_exists( __DIR__ . "/vendor/autoload.php" ) ) {
	require_once( __DIR__ . "/vendor/autoload.php" );
} else {
	exit( "<b>Fatal error</b>: Не удалось подключить пакеты composer'а<br>(<b>/vendor/autoload.php</b>)" );
}



/**
 * подключаем основные конфигурации
 */
if ( file_exists( __DIR__ . "/configs.php" ) ) {
	require_once( __DIR__ . "/configs.php" );
} else {
	exit( "Не удалось полключить файл с конфигурациями<br>(<b>" . __DIR__ . "/configs.php)</b>" );
}



/**
 * подключаем функционал для работы с логами
 */
if ( file_exists( PATH_FUNCTIONS . "/Log.php" ) ) {
	require_once( PATH_FUNCTIONS . "/Log.php" );
} else {
	exit( "Не удалось полключить функционал для работы с логами<br>(<b>" . PATH_FUNCTIONS . "/Log.php)</b>" );
}



/**
 * подключаем компоненты
 */

/**
 * работа с базой данных
 */
if ( file_exists( PATH_COMPONENTS . "/DataBase.class.php" ) ) {

	require_once( PATH_COMPONENTS . "/DataBase.class.php" );

	$dataBase_obj = new DataBase();
	$dataBase_connect = $dataBase_obj->connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );

	if ( $dataBase_connect == false ) {
		$logger_core->error( "Не удалось полключиться к базе данных" );
		exit();
	}

} else {
	$logger_core->error( "Не удалось полключить компонент для работы с базой данных (" . PATH_COMPONENTS . "/DataBase.class.php)" );
	exit();
}

/**
 * параметры страницы
 */
if ( file_exists( PATH_COMPONENTS . "/PageParams.class.php" ) ) {
	require_once( PATH_COMPONENTS . "/PageParams.class.php" );
} else {
	$logger_core->error( "Не удалось полключить компонент для указания параметров страницы (" . PATH_COMPONENTS . "/PageParams.class.php)" );
	exit();
}



/**
 * подключаем функционал для работы с маршрутизацией
 */
if ( file_exists( PATH_FUNCTIONS . "/Routing.php" ) ) {
	require_once( PATH_FUNCTIONS . "/Routing.php" );
} else {
	$logger_core->error( "Не удалось полключить компонент для работы с логами (" . PATH_FUNCTIONS . "" );
	exit();
}
