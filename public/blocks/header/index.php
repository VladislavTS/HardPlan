<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?=$pageParams->getParam( "metaTitle" ); ?></title>

	<link rel="stylesheet" type="text/css" href="/public/css/basic.css">
	<script type="text/javascript" src="/public/libs/jquery.js"></script>



	<!-- обработка форм методом ajax -->
	<script type="text/javascript" src="<?=PATH_FUNCTIONS ?>/js/form-ajax.js"></script>

	<!-- подключаем стили текущей станицы -->
	<?php if ( file_exists( PATH_PUBLIC_STYLES . "/" . $pageParams->getParam( "id" ) . "/style.css" ) ): ?>
		<link rel="stylesheet" type="text/css" href="/public/css/<?=$pageParams->getParam( "id" ) ?>/style.css">
	<?php endif; ?>

</head>
<body>