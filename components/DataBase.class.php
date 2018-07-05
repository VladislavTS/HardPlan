<?php

	/**
	 * Работа с базой данных.
	 *
	 * Содержит следующие функции:
	 * connect         - Подключение базы данных.
	 * signIn          - Авторизация пользователя.
	 * addUser         - Создание нового пользователя.
	 * verifyUser_ip   - Проверить ip указанного пользователя.
	 * getUserType     - Получить тип указанного пользователя.
	 * getUserTypeName - Получить название типа указанного пользователя.
	 *
	 */
	class DataBase
	{

		/**
		 * Подлючение к базе данных.
		 *
		 * @param  string $host     Хост, на котором расположена база данных.
		 * @param  string $user     Пользователь базы данных.
		 * @param  string $password Пароль от пользователя базы данных.
		 * @param  string $database Название базы данных.
		 *
		 * @return mysqli
		 */
		public function connect( $host, $user, $password, $database )
		{

			$connect = mysqli_connect( $host, $user, $password, $database ) or false;

			return $connect;

		}



		/**
		 * Функции для работы с пользователями.
		 */

		/**
		 * Авторизация пользователя.
		 *
		 * @param object $dataBase_connect подключение к базе данных
		 * @param string $email            email пользователя
		 * @param string $password         пароль пользователя
		 *
		 * @return bool
		 */
		public function signIn( $dataBase_connect, $email, $password )
		{

			/**
			 * Ищем пользователя.
			 */

			$password = md5( $password );
			$userIP   = $_SERVER[ "REMOTE_ADDR" ];

			$request = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$query   = mysqli_query( $dataBase_connect, $request );


			/**
			 * Проверяем, если пользователь был найден.
			 */
			if ( $query->num_rows < 1 )
				return false;


			/**
			 * Обновляем ip пользователя.
			 */
			$request = "UPDATE users SET ip='$userIP' WHERE email='$email'";
			if ( mysqli_query( $dataBase_connect, $request ) ) {
				$_SESSION[ "user" ] = $email;
			}
			else {
				return false;
			}

			return true;

		}

		/**
		 * Создание нового пользователя.
		 *
		 * @param object $dataBase_connect Подключение к базе данных.
		 * @param string $email            Email пользователя.
		 * @param string $password         Пароль пользователя.
		 *
		 * @return bool
		 */
		public function addUser( $dataBase_connect, $email, $password )
		{

			/**
			 * Проверяем, если пароль менее 6-и символов.
			 */
			if ( strlen( $password ) < 6 )
				return "Пароль должен содержать не менее 6-и символов";


			$password = md5( $password );
			$userIP   = $_SERVER[ "REMOTE_ADDR" ];


			$request = "INSERT INTO users " . " ( email, password, ip ) 
				VALUES " . " ( '$email', '$password', '$userIP' )";
			$query   = mysqli_query( $dataBase_connect, $request );


			if ( !$query ) {
				return false;
			}
			else {
				$_SESSION[ "user" ] = $email;
			}

			return true;

		}

		/**
		 * Проверить ip указанного пользователя.
		 *
		 * @param  object $dataBase_connect Подключение к базе данных.
		 * @param  string $email            Email пользователя.
		 *
		 * @return bool
		 */
		public function verifyUser_ip( $dataBase_connect, $email )
		{

			$userIP = $_SERVER[ "REMOTE_ADDR" ];

			$request = "SELECT ip FROM users WHERE email='$email'";
			$query   = mysqli_query( $dataBase_connect, $request );
			$result  = mysqli_fetch_array( $query );

			if ( count( $result ) < 1 )
				return false;
			if ( $result[ 0 ] != $userIP )
				return false;

			return true;

		}

		/**
		 * Получить тип указанного пользователя.
		 *
		 * @param  object $dataBase_connect Подключение к базе данных.
		 * @param  string $email            Email пользователя.
		 *
		 * @return string
		 */
		public function getUserType( $dataBase_connect, $email )
		{

			$request = "SELECT type FROM users WHERE email='$email'";
			$query   = mysqli_query( $dataBase_connect, $request );
			$result  = mysqli_fetch_array( $query );

			if ( $query->num_rows < 1 )
				return false;

			return $result[ 0 ];

		}

		/**
		 * Получить название типа указанного пользователя.
		 *
		 * @param  object $dataBase_connect Подключение к базе данных.
		 * @param  string $email            Email пользователя.
		 *
		 * @return string
		 */
		public function getUserTypeName( $dataBase_connect, $email )
		{

			$request = "SELECT type_name FROM users WHERE email='$email'";
			$query   = mysqli_query( $dataBase_connect, $request );
			$result  = mysqli_fetch_array( $query );

			if ( $query->num_rows < 1 )
				return false;

			return $result[ 0 ];

		}

		/**
		 * Получить имя указанного пользователя.
		 *
		 * @param  object $dataBase_connect Подключение к базе данных.
		 * @param  string $email            Email пользователя.
		 *
		 * @return string
		 */
		public function getUserName( $dataBase_connect, $email )
		{

			$request = "SELECT name FROM users WHERE email='$email'";
			$query   = mysqli_query( $dataBase_connect, $request );
			$result  = mysqli_fetch_array( $query );

			if ( $query->num_rows < 1 )
				return false;

			return $result[ 0 ];

		}

		/**
		 * Получить фамилию указанного пользователя.
		 *
		 * @param  object $dataBase_connect Подключение к базе данных.
		 * @param  string $email            Email пользователя.
		 *
		 * @return string
		 */
		public function getUserLastName( $dataBase_connect, $email )
		{

			$request = "SELECT last_name FROM users WHERE email='$email'";
			$query   = mysqli_query( $dataBase_connect, $request );
			$result  = mysqli_fetch_array( $query );

			if ( $query->num_rows < 1 )
				return false;

			return $result[ 0 ];

		}

		/**
		 * Получить полное имя указанного пользователя.
		 *
		 * @param  object $dataBase_connect Подключение к базе данных.
		 * @param  string $email            Email пользователя.
		 *
		 * @return string
		 */
		public function getUserFullName( $dataBase_connect, $email )
		{

			$request = "SELECT name, last_name FROM users WHERE email='$email'";
			$query   = mysqli_query( $dataBase_connect, $request );
			$names  = mysqli_fetch_array( $query );

			if ( $query->num_rows < 1 )
				return false;

			/**
			 * Получаем имя и фамилию пользователя.
			 */
			$result = $names[ "name" ];
			if ( $names[ "last_name" ] != "" ) $result .= " " . $names[ "last_name" ];

			return $result;

		}

	}