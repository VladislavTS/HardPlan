<?php

/**
 * настраиваем пакет Monolog
 * (логирование)
 */

use Monolog\Logger;
use Monolog\Handler\StreamHandler;



/**
 * создаем канал для логов ядра
 */
$logger_core = new Logger( "logger_core" );
$logger_core->pushHandler( new StreamHandler( "log/err_core.log", Logger::WARNING ) );

/**
 * создаем канал для логов роутера
 */
$logger_route = new Logger( "logger_route" );
$logger_route->pushHandler( new StreamHandler( "log/err_route.log", Logger::WARNING ) );

/**
 * создаем канал для логов успешных запросов
 */
$logger_succ = new Logger( "logger_succ" );
$logger_succ->pushHandler( new StreamHandler( "log/success.log", Logger::INFO ) );