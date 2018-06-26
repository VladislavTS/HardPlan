<?php

/**
 * работа с базой данных
 */
if ( file_exists( PATH_COMPONENTS . "/DataBase.class.php" ) ) {

	require_once( PATH_COMPONENTS . "/DataBase.class.php" );

	/**
	 * подключение к базе данных
	 */
	$dataBase_obj = new DataBase();
	$dataBase_connect = $dataBase_obj->connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );

	if ( $dataBase_connect == false ) {
		$logger_core->error( "Не удалось полключиться к базе данных" );
		exit();
	}

	if ( mysqli_select_db( DB_DATABASE ) ) {
		$logger_core->error( "Не удалось выбрать базу данных" );
		exit();
	}

} else {

	$logger_core->error( "Не удалось полключить компонент для работы с базой данных (" . PATH_COMPONENTS . "/DataBase.class.php)" );
	exit();

}