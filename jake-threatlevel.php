<?php
	require_once 'config.php';
	$table = 'threatlevel';
?>

			<?php
			$result = $db->get_var("SELECT current FROM `display` WHERE `table` = '".$table."'");
			$current = $db->get_var("SELECT backcolor FROM `".$table."` WHERE id = ".$result);
			$curr_level = $db->get_var("SELECT level FROM `".$table."` WHERE id = ".$result);
			$results = $db->get_row("SELECT level, description FROM `".$table."` WHERE id = ".$result);
			
			print $results->level . ' - ' . $results->description;
?>

