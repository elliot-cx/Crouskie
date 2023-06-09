<!DOCTYPE html>
<html>
	<head>
		<title><?= TITRE ?></title>
		<link rel="shortcut icon" href="<?= PATH_IMAGES ?>favicon.ico" type="image/x-icon">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="Language" content="<?= LANG ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link rel="stylesheet" href="<?= PATH_CSS ?>main.css">
		<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
		<script defer src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
		<script defer src="<?= PATH_SCRIPTS . 'main.js' ?>"></script>
		<!-- Ajout css dynamique -->
		<?php
		if (isset($page) && is_file(PATH_CSS.$page.".css")) {
			echo("<link rel=\"stylesheet\" href=\"".PATH_CSS.$page.".css\">");
		}
		?>
		<!-- Ajout js dynamique -->
		<?php
		if (isset($page) && is_file(PATH_SCRIPTS.$page.".js")) {
			echo("<script defer src=\"".PATH_SCRIPTS.$page.".js\"></script>");
		}
		?>
	</head> 