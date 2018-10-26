<?php
/* Config Username Password Database */
$server = "localhost";
$username = "root";
$password = "12345678";
$dbname = "attractions";
/* */
$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$webRoot  = str_replace(array($docRoot, 'include/config.inc.php'), '', $thisFile);
$srvRoot  = str_replace('include/config.inc.php', '', $thisFile);
define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);
?>
