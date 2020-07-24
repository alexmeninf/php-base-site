<?php require_once('functions.php'); ?>

<!DOCTYPE html>
<html class="no-js" lang="<?= bloginfo('language') ?>">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="<?php bloginfo('description') ?>">
	<meta name="url" content="<?php bloginfo('url') ?>">

	<title><?php bloginfo('name') ?></title>

	<?php get_includes_head(); ?>

<body>


	<header class="fix-header navbar navbar-expand-lg navbar-light">
		<div class="box-logo ml-3 ml-lg-0">
			<a href="<?= get_url() ?>">
				<img src="<?= get_url(); ?>/assets/img/logo.png" alt="logo <?php bloginfo('name') ?>">
			</a>
		</div>

		<button class="navbar-toggler my-2 mr-3 mr-lg-0 drawerButton border-none" drawer-status="false" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="d-none d-lg-block">
			<ul class="nav-head ml-auto">
				<li><a href="<?php get_url(); ?>"> Início</a></li>
			</ul>
		</div>
	</header>


	<div id="swipe-area" data-swipe-threshold="20" data-swipe-timeout="500" data-swipe-ignore="false"></div>
	<nav class="drawer-mobile" id="drawer">
		<span class="close-menu" aria-label="Fechar">
			<i class="fal fa-times"></i>
		</span>
		<ul>
			<li><a href="<?= get_url() ?>"><i class="fal fa-home mr-2"></i> Início</a></li>
		</ul>
	</nav>