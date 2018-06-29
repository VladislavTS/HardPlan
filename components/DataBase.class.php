<?php

session_start();



/**
 * работа с базой данных
 */
class DataBase
{

	/**
	 * подлючение к базе данных
	 *
	 * @param  $host
	 * @param  $user
	 * @param  $password
	 * @param  $database
	 *
	 * @return object mysqli_connect
	 */
	public function connect ( $host, $user, $password, $database )
	{

		$connect = mysqli_connect( $host, $user, $password, $database ) or false;
		return $connect;

	}



	/**
	 * авторизация пользователя
	 *
	 * @param object $dataBase_connect  подключение к базе данных
	 * @param string $email             email пользователя
	 * @param string $password          пароль пользователя
	 *
	 * @return bool
	 */
	public function signIn ( $dataBase_connect, $email, $password )
	{

		$password = md5( $password );

		$request = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$query = mysqli_query( $dataBase_connect, $request );

		if ( $query->num_rows < 1 ) return false;

		$_SESSION[ "user" ] = $email;

		return true;

	}



	/**
	 * создание нового пользователя
	 *
	 * @param object $dataBase_connect  подключение к базе данных
	 * @param string $email             email пользователя
	 * @param string $password          пароль пользователя
	 *
	 * @return bool
	 */
	public function addUser ( $dataBase_connect, $email, $password )
	{

		/**
		 * проверяем, если пароль менее 6-и символов
		 */
		if ( strlen( $password ) < 6 ) return "Пароль должен содержать не менее 6-и символов";



		$password = md5( $password );
		$userIP = $_SERVER[ "REMOTE_ADDR" ];

		$request = "INSERT INTO users " . 
			" ( email, password, user_ip ) VALUES " . 
			" ( '$email', '$password', '$userIP' )";
		$query = mysqli_query( $dataBase_connect, $request );



		if ( !$query ) {
			return false;
		} else {
			$_SESSION[ "user" ] = $email;
		}

		return true;

	}



	/**
	 * проверить ip указанного пользователя
	 *
	 * @param  object $dataBase_connect  подключение к базе данных
	 * @param  string $email             email пользователя
	 * @return bool
	 */
	public function verifyUser_ip ( $dataBase_connect, $email )
	{

		$userIP = $_SERVER[ "REMOTE_ADDR" ];

		$request = "SELECT * FROM users WHERE email='$email'";
		$query = mysqli_query( $dataBase_connect, $request );

		if ( $query->num_rows < 1 ) return false;
		return true;

	}

}