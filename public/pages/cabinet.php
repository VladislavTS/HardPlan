<?php

	/**
	 * Подключаем верхнюю часть сайта.
	 */
	require_once( PATH_PUBLIC_BLOCKS . "/header/index.php" );

?>


	<div class="left-menu">

		<div class="container">

			<h3 class="user-name">Цырдя Владислав</h3>
			<p class="user-type"><?= $dataBase_obj->getUserTypeName( $dataBase_connect, $_SESSION[ "user" ] ); ?></p>

			<div class="menu-list">
				<?php
					include( PATH_PUBLIC_INCLUDES . "/cabinet/" .
						$dataBase_obj->getUserType( $dataBase_connect, $_SESSION[ "user" ] ) .
						"/left-menu.php" );
				?>
			</div>
			<!-- menu-list -->

		</div>
		<!-- container -->

	</div>
	<!-- left-menu -->

	<div class="container container_content"></div>
	<!-- container__content -->


<?php

	/**
	 * Подключаем нижнюю часть сайта.
	 */
	require_once( PATH_PUBLIC_BLOCKS . "/footer/index.php" );