<?php

require 'inc/config.php';


function get_includes_head() {
	get_og_protocol(); ?>
	<link href="<?= get_icon_url() ?>" rel="shortcut icon">
	
	<link rel="stylesheet" type="text/css" href="<?= get_url() ?>/assets/css/bootstrap/bootstrap.css">
	<!-- 
	<link rel="stylesheet" type="text/css" href="<?= get_url() ?>/assets/plugins/wow/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= get_url() ?>/assets/plugins/fontawesome/css/all.min.css"> -->
	<link rel="stylesheet" type="text/css" href="<?= get_url() ?>/assets/css/main.css">	
<?php
}


function get_includes_footer() { ?>
	<script src="<?= get_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- 
	<script src="<?= get_url() ?>/assets/js/swiped-events.js"></script>
	<script src="<?= get_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= get_url() ?>/assets/plugins/wow/js/wow.min.js"></script>
	<script src="<?= get_url() ?>/assets/plugins/jquery-mask/js/jquery.mask.min.js"></script>
	<script src="<?= get_url() ?>/assets/plugins/sweetalert/sweetalert2.all.min.js"></script> --->
	<script src="<?= get_url() ?>/assets/plugins/lazyload.min.js"></script>
	<script src="<?= get_url() ?>/assets/js/main.js"></script>
<?php 
}