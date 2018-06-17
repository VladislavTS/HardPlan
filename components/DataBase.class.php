<?php

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
	 * @return object mysqli_connect
	 */
	public function connect ( $host, $user, $password, $database )
	{

		$connect = mysqli_connect( $host, $user, $password, $database ) or false;
		return $connect;

	}

}