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

$result = $db->get_var("SELECT current FROM `display` WHERE `table` = '".$table."'");
$current = $db->get_var("SELECT backcolor FROM `".$table."` WHERE id = ".$result);
$results = $db->get_results('SELECT * FROM `'.$table.'`');

foreach($results as $i)
{
	?><div class="<?php print $i->level; if($i->id == $result) { print ' ' . $i->level . '-curr current'; } ?>" title="<?php print $i->level; ?>"><?php print $i->description; ?></div><?php
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