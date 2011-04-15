<?php

date_default_timezone_set('America/Chicago');

// Include ezSQL core
require_once $_SERVER['DOCUMENT_ROOT'] . "/threatlevel/ezdb/ezDB_Base.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/threatlevel/ezdb/ezDB_MySQLi.class.php";

$db = new ezDB_mysqli('threatlevel','abc123','threatlevel','localhost') or die($db->error);

function _pr($a) {
    print '<pre>';
    print_r($a);
    print '</pre>';
}
function _p($a, $b = '') {
    if($b != '') {
        print '<b>'.$a.'</b>: '.$b.'<br />';
    }else {
        print $a . '<br />';
    }
}

?>
