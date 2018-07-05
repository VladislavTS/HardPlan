<nav block="menu">

	<a class="logo" href="/">Hard<b>Plan</b></a>



	<div class="hrefs-list">

		<a class="href" href="/personal">Сотрудники</a>

	</div>
	<!-- hrefs-list -->



	<div class="profile">

		<span class="profile_name"><?= $DB->getUserFullName( $DB_connect, $_COOKIE[ "user" ] ) ?></span>

		<div class="profile_img-container">
			<img class="profile_img" src="/uploads/users/crabs.jpg">
		</div>
		<!-- profile_img-container -->

	</div>
	<!-- profile -->

</nav>
<!-- block. menu -->