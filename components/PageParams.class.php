<?php

/**
 * параметры страницы
 */
class PageParams
{

	private $pageParams = array(

		"id"               => "",
		"title"            => "",

		"metaTitle"        => "",
		"metaDescription"  => "",
		"metaKeywords"     => "",

	);



	/**
	 * получить параметры страницы
	 *
	 * @return array
	 */
	public function getParams ()
	{

		return $this->pageParams;

	}

	/**
	 * получить параметр страницы
	 *
	 * @return value
	 */
	public function getParam ( $paramName )
	{

		if ( $this->pageParams[ $paramName ] ) {
			return $this->pageParams[ $paramName ];
		} else {
			return false;
		}

	}

	/**
	 * указать параметры страницы
	 *
	 * @param  string $paramName  название параметра
	 * @param  string $paramValue значение параметра
	 * @return bool   успешность операции
	 */
	public function setPageParams ( $paramName, $paramValue )
	{

		if ( $this->pageParams[ $paramName ] = $paramValue ) {
			return true;
		} else {
			return false;
		}

	}

}