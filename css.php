body { font-family: Arial; margin: 0 auto; }
div { width: 400px; padding: 10px; text-align: center; font-size: small; margin-left: auto; margin-right: auto; margin-top: 5px; margin-bottom: 5px; border: 1px solid black;}
<?php

require_once 'config.php';

if($_POST)
{
	$db->query("UPDATE `display` SET `current` = ".$_POST['threatlevel']." WHERE `table` = 'threatlevel'");
}

$result = $db->get_var("SELECT current FROM `display` WHERE `table` = 'threatlevel'");

$current = $db->get_var("SELECT backcolor FROM `threatlevel` WHERE id = ".$result);

$results = $db->get_results('SELECT * FROM `threatlevel`');

foreach($results as $i)
{
	?>.<?php print $i->level; ?> { background: <?php print $i->backcolor; ?>; color: <?php print $i->forecolor; ?>; }<?php
}
?>
.current {
	font-weight: bold;
	font-size: x-large;
	text-decoration: blink;
	-moz-box-shadow: 0 0 1em 0.5em <?php print $current; ?>;
	-webkit-box-shadow: 0 0 1em 0.5em <?php print $current; ?>;
}
#page { margin: 0 auto; width: 500px; text-align: center; border: 0; }