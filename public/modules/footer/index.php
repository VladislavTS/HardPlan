
	<?php

		/**
		 * подключаем содержимое футера для текущей страницы
		 */
		if ( file_exists( PATH_PUBLIC_INCLUDES . "/" . $pageParams->getParam( "id" ) . "/footer.php" ) ) {
			include_once( PATH_PUBLIC_INCLUDES . "/" . $pageParams->getParam( "id" ) . "/footer.php" );
		}

	?>



</body>
</html>