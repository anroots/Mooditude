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
	<link rel="stylesheet" href="<?=URL::base()?>assets/css/theme.css">
	<link rel="stylesheet" href="<?=URL::base()?>assets/css/main.css">
	<?=Assets::render(Assets::CSS)?>
	<!-- end CSS-->

	<script src="<?=URL::base()?>assets/shared/js/libs/modernizr-2.0.6.min.js"></script>
	<script src="<?=URL::base()?>assets/shared/js/libs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
		var base_url = '<?=URL::base()?>';
	</script>
</head>

<body>

<div id="container">
	<header>
		<h1><?=Kohana::$config->load('app.title')?></h1>

		<h2><?=$title?></h2>

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
<?=Assets::render(Assets::SCRIPT)?>
</body>
</html>