<?php

	session_start();

	/**
	 * Подключаем необходимые компоненты.
	 */
	require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/configs.php" );
	require_once( PATH_ROOT . "/vendor/autoload.php" );
	require_once( PATH_ROOT . "/configs.php" );
	require_once( PATH_FUNCTIONS . "/Log.php" );
	require_once( PATH_ROOT . "/db_connect.php" );



	$email    = $_POST[ "email" ];
	$password = $_POST[ "pass" ];



	/**
	 * Проверяем, верно ли указан формат почты.
	 */
	if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

		$_SESSION[ "service-message__error" ] = "Не верный формат почты";

		$logger_error->error(
			"Пользователь ввел не верный формат почты. Не сработала html валидация",
			array(
				"User" => $_SERVER[ "REMOTE_ADDR" ],
				"Email" => $email,
				"Path to component" => PATH_ROOT . "/db_connect.php",
				"Error path" => __FILE__
			)
		);

		header( "Location: /" );

	}



	/**
	 * Пробуем авторизоваться.
	 */
	$signIn_status = $DB->signIn( $DB_connect, $email, $password );
	if ( $signIn_status !== true ) {

		$_SESSION[ "service-message__error" ] = "Не получилось авторизоваться";

		$logger_error->error(
			"У пользователя не получилось авторизоваться",
			array(
				"User" => $_SERVER[ "REMOTE_ADDR" ],
				"Email" => $email
			)
		);

		header( "Location: /" );

	}



	/**
	 * Если ошибок не возникло
	 */

	$_SESSION[ "user" ]                   = $email;
	$_SESSION[ "service-message__error" ] = "Вы успешно авторизовались";

	$logger_succ->info(
		"Пользователь авторизовался",
		array(
			"User" => $_SERVER[ "REMOTE_ADDR" ],
			"Email" => $email
		)
	);

	header( "Location: /" );