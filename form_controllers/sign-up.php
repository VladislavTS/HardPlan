<?php

	/**
	 * Подключаем необходимые компоненты.
	 */
	require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/configs.php" );
	require_once( PATH_ROOT . "/vendor/autoload.php" );
	require_once( PATH_ROOT . "/configs.php" );
	require_once( PATH_ROOT . "/db_connect.php" );



	$email           = $_POST[ "email" ];
	$password        = $_POST[ "pass" ];
	$password_double = $_POST[ "pass_double" ];



	/**
	 * Проверяем, совпадают ли пароли.
	 */
	if ( $password !== $password_double ) {

		$_SESSION[ "service-message__error" ] = "Не совпадают пароли";
		header( "Location: /" );

	}

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
	 * Пробуем зарегистрироваться.
	 */
	$addUser_status = $DB->addUser( $DB_connect, $email, $password );
	if ( $addUser_status !== true ) {

		$_SESSION[ "service-message__error" ] = "Этот email уже используется";
		header( "Location: /" );

	}



	/**
	 * Если ошибок не возникло
	 */

	$_SESSION[ "user" ]                   = $email;
	$_SESSION[ "service-message__error" ] = "Вы успешно зарегистрированы";

	$logger_succ->info(
		"Пользователь зарегистрировался",
		array(
			"User" => $_SERVER[ "REMOTE_ADDR" ],
			"Email" => $email
		)
	);

	header( "Location: /" );