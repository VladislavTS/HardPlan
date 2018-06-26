<?php

/**
 * подключаем компоненты для работы с базой данных
 */
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/configs.php" );
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/db_connect.php" );



$email            = $_POST[ "email" ];
$password         = $_POST[ "pass" ];
$password_double  = $_POST[ "pass_double" ];



/**
 * проверяем, совпадают ли пароли
 */
if ( $password !== $password_double ) {

	header( "HTTP/1.0 401 Unauthorized" );
	exit( "Пароли не совпадают" );

}

/**
 * проверяем, верно ли указан формат почты
 */
if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

	header( "HTTP/1.0 500 Internal Server Error" );
	exit( "Не верный формат почты" );

}



$addUser_status = $dataBase_obj->addUser( $dataBase_connect, $email, $password );
if ( $addUser_status !== true ) {
	header( "HTTP/1.0 500 Internal Server Error" );
	exit( "Этот email уже используется" );
}



header( "HTTP/1.0 200 OK" );
exit( "Вы успешно авторизированы" );