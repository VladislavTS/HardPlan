<?php

/**
 * подключаем верхнюю часть сайта
 */
require_once( PATH_PUBLIC_BLOCKS . "/header/index.php" );

?>



<div class="container__full-page">

	<form method="post" redirect="" name="sign-in" tab="sign-in" class="ajax sign-form active">

		<p>
			Пожалуйста, авторизируйтесь для входа в систему<br>
			<span tab-button="sign-up">Создать новый аккаунт</span>
		</p>

		<div class="inputs-block">

			<input type="email" name="email" placeholder="Введите ваш email" required>
			<input type="password" name="pass" placeholder="Введите ваш пароль" required>

			<div class="form-answer"></div>

			<input type="submit" name="sign-submit" value="Войти">

		</div>
		<!-- inputs-block -->

	</form>
	<!-- form. sign-in -->



	<form method="post" redirect="" name="sign-up" tab="sign-up" class="ajax sign-form">

		<p>
			Пожалуйста, расскажите немного о себе<br>
			<span tab-button="sign-in">У меня уже есть аккаунт</span>
		</p>

		<div class="inputs-block">

			<input type="email" name="email" placeholder="Введите ваш email" required>
			<input type="password" name="pass" placeholder="Введите ваш пароль" required>
			<input type="password" name="pass_double" placeholder="Подтвердите пароль" required>

			<div class="form-answer"></div>

			<input type="submit" name="sign-submit" value="Зарегистрироваться">

		</div>
		<!-- inputs-block -->

	</form>
	<!-- form. sign-up -->

</div>
<!-- container__full-page -->



<?php

/**
 * подключаем нижнюю часть сайта
 */
require_once( PATH_PUBLIC_BLOCKS . "/footer/index.php" );

?>