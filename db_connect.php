<?php

	/**
	 * Подключаем функционал для работы с базой данных.
	 */

	if ( !file_exists( PATH_COMPONENTS . "/DataBase.class.php" ) ) {

		$logger_core->error( "Не удалось полключить компонент для работы с базой данных", array(
			"Path to component" => PATH_COMPONENTS . "/DataBase.class.php",
			"Error path" => __FILE__
		) );
		exit( ERROR_MESSAGE );

	}
	else {

		require_once( PATH_COMPONENTS . "/DataBase.class.php" );

		/**
		 * Создаем новое соединение к базе данных.
		 */
		$DB         = new DataBase();
		$DB_connect = $DB->connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );

		/**
		 * Проверяем подключение к базе данных.
		 */
		if ( $DB_connect === false ) {

			$logger_core->error( "Не удалось полключиться к базе данных", array(
				"Host" => DB_HOST,
				"User" => DB_USER,
				"Password" => DB_PASSWORD,
				"Database" => DB_DATABASE,
				"Error path" => __FILE__
			) );
			exit( ERROR_MESSAGE );

		}

		/**
		 * Выбираем базу с которой будем работать.
		 */
		if ( mysqli_select_db( DB_DATABASE ) ) {

			$logger_core->error( "Не удалось выбрать базу данных", array(
				"Database" => DB_DATABASE,
				"Error path" => __FILE__
			) );
			exit( ERROR_MESSAGE );

		}

	}