<?php

	/**
	 * Работа с параметрами страницы.
	 */
	class PageParams
	{

		/**
		 * Массив с параметрами страницы.
		 */
		private $pageParams = array(

			"id" => "",
			"title" => "",

			"metaTitle" => "",
			"metaDescription" => "",
			"metaKeywords" => "",

		);

		/**
		 * Получить параметры страницы.
		 *
		 * @return array
		 */
		public function getParams()
		{

			return $this->pageParams;

		}

		/**
		 * Получить указанный параметр страницы.
		 *
		 * @return value
		 */
		public function getParam( $paramName )
		{

			if ( $this->pageParams[ $paramName ] ) {
				return $this->pageParams[ $paramName ];
			}
			else {
				return false;
			}

		}

		/**
		 * Задать параметр страницы.
		 *
		 * @param  string $paramName  Название параметра.
		 * @param  string $paramValue Значение параметра.
		 *
		 * @return bool
		 */
		public function setPageParam( $paramName, $paramValue )
		{

			if ( $this->pageParams[ $paramName ] = $paramValue ) {
				return true;
			}
			else {
				return false;
			}

		}

	}