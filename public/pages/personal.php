<?php

	/**
	 * Подключаем верхнюю часть сайта.
	 */
	require_once( PATH_PUBLIC_BLOCKS . "/header/index.php" );
	require_once( PATH_PUBLIC_BLOCKS . "/menu/index.php" );

?>



	<div class="container">

		<div class="left-menu">

			<h6 class="title">Super-менеджеры</h6>

			<div class="personal-list">

				<a class="person" href="/">Ягодка Дан</a>
				<a class="person" href="/">Пашенцев Максим</a>

			</div>
			<!-- personal-list -->

			<h6 class="title">Менеджеры</h6>

			<div class="personal-list">

				<a class="person" href="/">Степаненко Максим</a>
				<a class="person" href="/">Бучнев Максим</a>
				<a class="person" href="/">Самохвалов Андрей</a>

			</div>
			<!-- personal-list -->

			<h6 class="title">Прогеры</h6>

			<div class="personal-list">

				<a class="person" href="/">Александр Пилинчук</a>
				<a class="person" href="/">Рамиль Данчинов</a>
				<a class="person" href="/">Цырдя Владислав</a>

			</div>
			<!-- personal-list -->

		</div>
		<!-- left-menu -->

	</div>
	<!-- container -->



<?php

	/**
	 * Подключаем нижнюю часть сайта.
	 */
	require_once( PATH_PUBLIC_BLOCKS . "/footer/index.php" );