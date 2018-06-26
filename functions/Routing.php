<?php

/**
 * получаем запрос
 */
$httpMethod = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"];

/**
 * обрезаем query запрос и декодируем uri
 */
if ( false !== $pos = strpos( $uri, "?" ) ) {
	$uri = substr( $uri, 0, $pos );
}
$uri = rawurldecode( $uri );



/**
 * настраиваем диспетчер запросов
 */
$dispatcher = FastRoute\simpleDispatcher( function( FastRoute\RouteCollector $router )
{

	$router->addRoute( "GET", "/", "front" );
	$router->addRoute( "GET", "/user/{id:\d+}", "get_user_handler" );
	$router->addRoute( "GET", "/articles/{id:\d+}[/{title}]", "get_article_handler" );

} );



/**
 * обрабатываем запрос
 */

$routeInfo = $dispatcher->dispatch( $httpMethod, $uri );

/**
 * проверяем статус запроса
 */
switch ( $routeInfo[0] )
{

	case FastRoute\Dispatcher::NOT_FOUND:

		$logger_route->error( "404 ${uri}" );

		break;

	case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:

		$allowedMethods = $routeInfo[1];
		$logger_route->error( "Метод не поддерживается (${allowedMethods} - $uri)" );

		break;

	case FastRoute\Dispatcher::FOUND:

		$handler = $routeInfo[1];
		$vars = $routeInfo[2];
		$logger_succ->info( "$uri" );

		$pageParams = new PageParams();

		/**
		 * проверяем, авторизирован ли пользователь
		 */
		if ( !$_SESSION["user"] ) {

			/**
			 * подключаем контроллер страницы авторизации
			 */
			if ( !include_once( PATH_PAGE_CONTROLLERS . "/sign.php" ) )
				$logger_route->error( "Контроллер для страницы sign не найден" );

		} else {

			/**
			 * подключаем контроллер нужной страницы
			 */
			if ( !include_once( PATH_PAGE_CONTROLLERS . "/${handler}.php" ) )
				$logger_route->error( "Контроллер для страницы ${handler} не найден" );

		}

		break;

}