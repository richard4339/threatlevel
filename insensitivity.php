<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Insensitivity Office</title>
		<style type="text/css">
		body { font-family: Arial; }
		div { width: 400px; padding: 10px; text-align: center; font-size: small; }
		div:hover { font-weight: bold; }
		<?php

		require_once 'config.php';

		$results = $db->get_results('SELECT * FROM `insensitivity`');

		foreach($results as $i)
		{
			?>.<?php print $i->level; ?> { background: #<?php print $i->backcolor; ?>; color: #<?php print $i->forecolor; ?>; }<?php
		}
		?>
		.current { font-weight: bold; font-size: x-large; text-decoration: blink; }
			/* Main Nav */
	#banner nav {
		background: #000305;
		font-size: 1.143em;
		height: 40px;
		line-height: 30px;
		margin: 0 auto 2em auto;
		padding: 0;
		text-align: center;
		width: 800px;

		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}

	#banner nav ul {list-style: none; margin: 0 auto; width: 800px;}
	#banner nav li {float: left; display: inline; margin: 0;}

	#banner nav a:link, #banner nav a:visited {
		color: #fff;
		display: inline-block;
		height: 30px;
		padding: 5px 1.5em;
		text-decoration: none;
	}
	#banner nav a:hover, #banner nav a:active,
	#banner nav .active a:link, #banner nav .active a:visited {
		background: #C74451;
		color: #fff;
		text-shadow: none !important;
	}

	#banner nav li:first-child a {
		border-top-left-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-webkit-border-top-left-radius: 5px;

		border-bottom-left-radius: 5px;
		-moz-border-radius-bottomleft: 5px;
		-webkit-border-bottom-left-radius: 5px;
	}

		</style>
	</head>
	<body>
	<header id="banner" class="body">
		<img src="logo.png" />
		<h1>Insensitivity Office</h1>
	</header>
	<section>
	<?php foreach($results as $i)
	{
		?><div class="<?php print $i->level; if($i->current == 1) { print ' current'; } ?>"><?php print $i->description; ?></div><?php
		}
		?>
	</section>
	</body>
</html>
