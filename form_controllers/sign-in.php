<?php

/**
 * подключаем компоненты для работы с базой данных
 */
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/configs.php" );
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/db_connect.php" );



$email     = $_POST[ "email" ];
$password  = $_POST[ "pass" ];



/**
 * проверяем, верно ли указан формат почты
 */
if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

	header( "HTTP/1.0 500 Internal Server Error" );
	exit( "Не верный формат почты" );

}



$signIn_status = $dataBase_obj->signIn( $dataBase_connect, $email, $password );
if ( $addUser_status !== true ) {
	header( "HTTP/1.0 500 Internal Server Error" );
	exit( "Не получилось авторизироваться" );
}



header( "HTTP/1.0 200 OK" );
exit( "Вы успешно авторизированы" );