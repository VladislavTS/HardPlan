<?php

	/**
	 * Проверяем, подключено ли ядро.
	 */
	if ( IS_CORE_INC !== true )
		exit( "silence gold" );



	/**
	 * Получаем запрос.
	 */
	$httpMethod = $_SERVER[ "REQUEST_METHOD" ];
	$uri        = $_SERVER[ "REQUEST_URI" ];

	/**
	 * Обрезаем query запрос и декодируем uri.
	 */
	if ( false !== $pos = strpos( $uri, "?" ) ) {
		$uri = substr( $uri, 0, $pos );
	}
	$uri = rawurldecode( $uri );



	/**
	 * Настраиваем диспетчер запросов.
	 */
	$dispatcher = FastRoute\simpleDispatcher( function ( FastRoute\RouteCollector $router ) {

		$router->addRoute( "GET", "/", "tasks" );
		$router->addRoute( "GET", "/user/{id:\d+}", "get_user_handler" );
		$router->addRoute( "GET", "/articles/{id:\d+}[/{title}]", "get_article_handler" );

	} );



	/**
	 * Обрабатываем запрос.
	 */

	$routeInfo = $dispatcher->dispatch( $httpMethod, $uri );

	/**
	 * Проверяем статус запроса.
	 */
	switch ( $routeInfo[ 0 ] ) {

		/**
		 * Если запрашиваемый путь не найден.
		 */
		case FastRoute\Dispatcher::NOT_FOUND:

			$logger_route->error( "404 ${uri}" );

			break;

		/**
		 * Если запрашиваемый метод не поддерживается.
		 */
		case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:

			$allowedMethods = $routeInfo[ 1 ];
			$logger_route->error( "Метод не поддерживается (${allowedMethods} - $uri)" );

			break;

		/**
		 * Если запрашиваемый путь был успешно найден.
		 */
		case FastRoute\Dispatcher::FOUND:

			$controllerName     = $routeInfo[ 1 ];
			$controllerPathName = $routeInfo[ 2 ];

			$logger_succ->info( "$uri" );

			$pageParams = new PageParams();

			/**
			 * Проверяем, авторизирован ли пользователь.
			 */
			if ( !$_COOKIE[ "user" ] ) {

				/**
				 * Подключаем контроллер страницы авторизации.
				 */
				if ( !include_once( PATH_PAGE_CONTROLLERS . "/sign.php" ) )
					$logger_route->error( "Контроллер для страницы sign не найден", array(
						"Path to controller" => PATH_PAGE_CONTROLLERS . "/sign.php",
						"Error path" => __FILE__
					) );

			}
			else {

				/**
				 * Проверяем соответствие ip пользователя.
				 */
				if ( $DB->verifyUser_ip( $DB_connect, $_COOKIE[ "user" ] ) !== true ) {

					/**
					 * Подключаем контроллер страницы авторизации.
					 */
					if ( !include_once( PATH_PAGE_CONTROLLERS . "/sign.php" ) )
						$logger_route->error( "Контроллер для страницы sign не найден", array(
							"Path to controller" => PATH_PAGE_CONTROLLERS . "/sign.php",
							"Error path" => __FILE__
						) );

				}
				else {

					/**
					 * Подключаем контроллер нужной страницы.
					 */
					if ( !include_once( PATH_PAGE_CONTROLLERS . "/${controllerName}.php" ) )
						$logger_route->error( "Контроллер для страницы ${controllerName} не найден", array(
							"Path to controller" => PATH_PAGE_CONTROLLERS . "/${controllerName}.php",
							"Error path" => __FILE__
						) );

				}

			}

			break;

	}