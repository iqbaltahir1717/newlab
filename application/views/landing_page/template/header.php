<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?php echo $setting[0]->setting_appname . " - " . str_replace("-", " ", ucwords($this->uri->segment(1))); ?> </title>
	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" rel="icon">

	<meta name="title" content="<?php echo $setting[0]->setting_appname; ?>">
	<meta name="description" content="<?php echo $setting[0]->setting_about; ?>">
	<meta name="keywords" content="gramercy jakarta, gramercy, portal-studio, <?php echo $setting[0]->setting_appname; ?>, <?php echo $setting[0]->setting_owner_name; ?>">
	<meta name="robots" content="index, nofollow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="<?php echo $setting[0]->setting_owner_name; ?>">


	<link href="<?php echo base_url() ?>assets/landing_page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/landing_page/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/landing_page/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/landing_page/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/landing_page/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/landing_page/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/landing_page/vendor/font-awesome/all.min.css" rel="stylesheet">


	<!-- CSS -->
	<link href="<?php echo base_url() ?>assets/landing_page/css/min.style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/landing_page/css/main.css" rel="stylesheet">

	<!-- select2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/extensions/choices.js/public/assets/styles/choices.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<style type="text/css">
		#map-canvas {
			width: 100%;
			height: 300px;
			border: solid;
		}
	</style>
</head>