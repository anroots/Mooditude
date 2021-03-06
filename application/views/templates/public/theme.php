<?php defined('SYSPATH') or die('No direct script access.')?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?=$title?></title>
	<meta name="description" content="<?=Kohana::$config->load('app.description')?>">
	<meta name="author" content="Ando Roots">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!-- CSS concatenated and minified via ant build script-->
	<link rel="stylesheet" href="<?=URL::base()?>assets/shared/css/bootstrap-1.4.0.min.css">
	<link rel="stylesheet" href="<?=URL::base()?>assets/shared/css/aristo/jquery-ui-1.8.7.custom.css">
	<link rel="stylesheet" href="<?=URL::base()?>assets/css/public/theme.css">
	<?=Assets::render(Assets::CSS)?>
	<!-- end CSS-->

	<script src="<?=URL::base()?>assets/shared/js/libs/jquery-1.7.1.min.js"></script>
	<script src="<?=URL::base()?>assets/shared/js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

<div id="container">
	<header>
		<h1>
			<a href="<?=URL::base()?>"><?=Kohana::$config->load('app.title')?></a>
		</h1>

		<div class="clearfix"></div>
	</header>


	<div id="main" role="main">
		<?=Notify::render()?>
		<?=$content?>
	</div>

	<footer>
		<?=Kohana::$config->load('app.codename')?> versioon <?=Kohana::$config->load('app.version')?>
		<a href="https://github.com/anroots/Mooditude" title="GitHub">Fork me on GitHub</a>
	</footer>
</div>
<!--! end of #container -->
<script src="<?=URL::base()?>assets/shared/js/libs/jquery-ui-1.8.16.min.js"></script>
<script src="<?=URL::base()?>assets/js/common.js"></script>
<?=Assets::render(Assets::SCRIPT)?>
</body>
</html>