<?php

/**
 * подключаем верхнюю часть сайта
 */
require_once( PATH_PUBLIC_BLOCKS . "/header/index.php" );

?>



<div class="left-menu">

	<div class="portfolio-img_container">
		<img src="/uploads/users/crabs.jpg">
	</div>
	<!-- portfolio-img_container -->



	<div class="container">

		<input class="input-text" name="user-name" placeholder="Фамилия и имя" type="text" >
		<input class="input-text" name="user-phone" placeholder="Телефон" type="text" >

	</div>
	<!-- container -->

</div>
<!-- left-menu -->

<div class="container container_content"></div>
<!-- container__content -->



<?php

/**
 * подключаем нижнюю часть сайта
 */
require_once( PATH_PUBLIC_BLOCKS . "/footer/index.php" );