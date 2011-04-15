<html>
<head>
<style type="text/css">
body { font-family: Arial; }
div { width: 400px; padding: 10px; text-align: center; font-size: small; }
<?php

require_once 'config.php';

$results = $db->get_results('SELECT * FROM `cuil`');

foreach($results as $i)
{
	?>.<?php print $i->level; ?> { background: #<?php print $i->backcolor; ?>; color: #<?php print $i->forecolor; ?>; }<?php
}
?>
.current { font-weight: bold; font-size: x-large; }
</style>
</head>
<body>
<div><img src="logo.png" /></div>
<h1>Cuil Level</h1>
<?php foreach($results as $i)
{
	?><div class="<?php print $i->level; if($i->current == 1) { print ' current'; } ?>"><?php print $i->level . ' - ' . $i->description; ?></div><?php
	}
	?>
</body>
</html>
