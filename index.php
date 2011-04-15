<?php
	require_once 'config.php';
	if($_GET['t'] == '')
	{
		$table = 'threatlevel';
	}
	else
	{
		$table = $_GET['t'];
	}
	if($table == 'threatlevel') { $title = 'Threat Level'; }
	elseif ($table == 'insensitivity') { $title = 'Insensitivity Office'; }
	else { $title = 'Cuil Level'; }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php print $title; ?></title>
		<style type="text/css">
			body { font-family: Arial; margin: 0 auto; }
			div { width: 400px; padding: 10px; text-align: center; font-size: small; margin-left: auto; margin-right: auto; margin-top: 5px; margin-bottom: 5px; border: 1px solid black;}
			<?php
			if($_POST)
			{
				$db->query("UPDATE `display` SET `current` = ".$_POST['update']." WHERE `table` = '".$table."'");
			}
			$result = $db->get_var("SELECT current FROM `display` WHERE `table` = '".$table."'");
			$current = $db->get_var("SELECT backcolor FROM `".$table."` WHERE id = ".$result);
			$curr_level = $db->get_var("SELECT level FROM `".$table."` WHERE id = ".$result);
			$results = $db->get_results('SELECT * FROM `'.$table.'`');
			foreach($results as $i)
			{
				?>				.<?php print $i->level; ?> { background: <?php print $i->backcolor; ?>; color: <?php print $i->forecolor; ?>; }
							.<?php print $i->level; ?>-curr { -moz-box-shadow: 0 0 1em 0.5em <?php print $i->shadow; ?>; -webkit-box-shadow: 0 0 1em 0.5em <?php print $i->shadow; ?>; }<?php
			} ?>
			.current {
				font-weight: bold;
				font-size: x-large;
				text-decoration: blink;
			}
			#page { margin: 0 auto; width: 500px; text-align: center; border: 0; }
			input { -moz-box-shadow: 3px 3px 5px black; }
		</style>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/prototype/1/prototype.js'></script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/scriptaculous/1/scriptaculous.js'></script>
		<script type='text/javascript'>
			new Ajax.PeriodicalUpdater('content', 'content.php?t=<?php print $table; ?>',
			{
				method: 'get',
				frequency: 60,
				decay: 2
			});
			document.observe('dom:loaded', function() { Effect.Pulsate('<?php print $curr_level; ?>'); });

		</script>
	</head>
	<body>
	<div id="page">
		<header>
			<img src="logo.png" />
			<h1><?php print $title; ?></h1>
		</header>
		<section id="content">
		<?php foreach($results as $i)
		{
			?><div id="<?php print $i->level; ?>" class="<?php print $i->level; if($i->id == $result) { print ' ' . $i->level . '-curr current'; } ?>" title="<?php print $i->level; ?>"><?php print $i->description; ?></div><?php
			}
			?>
		<form method="POST">
			<select name="update" id="form" action="index.php">
				<?php foreach($results as $i)
				{
					?><option value="<?php print $i->id; ?>" <?php if($i->id == $result) { print 'SELECTED'; } ?>><?php print $i->level; ?></option><?php
				}?>
			</select>
			<input type="submit" value="Update" id="submit">
		</form>
		</section>
		<footer><a href="?t=threatlevel">Threat Level</a> | <a href="?t=insensitivity">Insensitivity Office</a> | <a href="?t=cuil">Cuil Level</a></footer>
	</div>
	</body>
</html>
